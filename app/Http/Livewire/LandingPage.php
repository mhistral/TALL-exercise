<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;

class LandingPage extends Component
{
    public $email;
    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email'
    ];

    public function render()
    {
        return view('livewire.landing-page');
    }

    public function subscribe(){
        $this->validate();
        DB::transaction(function () {
            $subscriber = Subscriber::create([
                'email' => $this->email,
            ]);

            $notification = new VerifyEmail;
            $notification->createUrlUsing(function($notifiable){ // customized URL of the email link that are sent
                return URL::temporarySignedRoute(
                    'subscribers.verify',
                    now()->addMinutes(30),
                    [
                        'subscriber' => $notifiable->getKey()
                    ]
                );
            });
            $subscriber->notify($notification); // send notification to the subscriber
        }, $deadlockRestries = 5); // when the sending verification is in progress and the other one is trying to subscribe, we can retry it serveral times

        $this->reset('email');
    }
}
