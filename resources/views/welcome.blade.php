<x-guest-layout>
    <div
        class="flex flex-col w-full h-screen bg-indigo-900"

        x-data="{
            showSubscribe: false
        }"
    >
        <nav class="flex pt-5 justify-between container mx-auto text-indigo-200">
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

        <div class="flex container mx-auto items-center h-full" >
            <div class="flex flex-col w-1/3 items-start">

                <h1 class="text-white font-bold text-5xl leading-tight mb-4">
                    Simple generic landing page to Subscribe
                </h1>

                <p class="text-indigo-200 text-xl mb-10">
                    We Are just checking <span class="font-bold underline">TALL</span> stack. Would you mind subscribing?
                </p>

                <x-button
                    class="py-3 px-8 bg-red-500 hover:bg-red-600"
                    x-on:click="showSubscribe=true"
                >
                    Subscribe
                </x-button>

            </div>
        </div>

        <div
            class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full"
            x-show="showSubscribe"
            x-on:click.self="showSubscribe=false"
            x-on:keydown.escape.window="showSubscribe=false"
        >
            <div class="m-auto bg-pink-500 shadow-2xl rounded-xl p-8">

                <p class="text-white text-5xl font-extrabold text-center">
                    Let's do it!
                </p>

                <form class="flex flex-col items-center p-24" action="">
                    <x-input
                    class="px-5 py-3 w-80 border border-blue-400"
                    type="email"
                    name="email"
                    placeholder="Email"></x-input>

                    <span class="text-gray-100 text-xs">
                        We will send you a confirmation Email.
                    </span>

                    <x-button
                        class="px5 py-3 mt-5 w-80 bg-blue-500 justify-center"
                    >
                        Get in
                    </x-button>
                </form>

            </div>
        </div>

    </div>


</x-guest-layout>

