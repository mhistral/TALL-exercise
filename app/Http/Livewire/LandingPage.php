<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;

class LandingPage extends Component
{
    public $email ;

    public function render()
    {
        return view('livewire.landing-page');
    }

    public function subscribe(){
        // Log::debug($this->email);
        $subscriber = Subscriber::create([
            'email' => $this->email,
        ]);

        $this->reset('email');
    }
}
