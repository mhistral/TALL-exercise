<div class="flex flex-col w-full h-screen bg-indigo-900"
    x-data="{
        showSubscribe: false,
        showSuccess: false,
    }" >
    <nav class="container flex justify-between pt-5 mx-auto text-indigo-200">
        <a href="/" class="text-4xl font-bold">
            <x-application-logo class="w-16 h-16 fill-current">
            </x-application-logo>
        </a>

        <div class="flex justify-end">
            @auth
                <a href="{{ route("dashboard") }}">Dashboard</a>
            @else
                <a href="{{ route("login") }}">Login</a>
            @endauth
        </div>
    </nav>

    <div class="container flex items-center h-full mx-auto" >
        <div class="flex flex-col items-start w-1/3">

            <h1 class="mb-4 text-5xl font-bold leading-tight text-white">
                Simple generic landing page to Subscribe
            </h1>

            <p class="mb-10 text-xl text-indigo-200">
                We Are just checking <span class="font-bold underline">TALL</span> stack. Would you mind subscribing?
            </p>

            <x-button
                class="px-8 py-3 bg-red-500 hover:bg-red-600"
                x-on:click="showSubscribe=true"
            >
                Subscribe
            </x-button>

        </div>
    </div>


    <x-modal class="bg-pink-500" trigger="showSubscribe">
        <p class="text-5xl font-extrabold text-center text-white">
            Let's do it!
        </p>

        <form class="flex flex-col items-center p-24" action="" wire:submit.prevent="subscribe">
            <x-input class="px-5 py-3 border border-blue-400 w-80" type="email" name="email" placeholder="Email Address" wire:model="email"></x-input>

            <span class="text-xs text-gray-100">
                {{
                    $errors->has('email')
                    ? $errors->first('email')
                    : "We will send you a confirmation Email"
                }}
            </span>

            <x-button class="justify-center py-3 mt-5 bg-blue-500 px5 w-80">
                Get in
            </x-button>
        </form>
    </x-modal>

    <x-modal class="bg-green-500" trigger="showSuccess">
        <p class="font-extrabold text-center text-white animate-pulse text-9xl">
            &check;
        </p>
        <p class="mt-16 text-5xl font-extrabold text-center text-white">
            Great!
        </p>
        <p class="text-3xl text-center text-white">
            See you in your Inbox
        </p>
    </x-modal>


</div>
