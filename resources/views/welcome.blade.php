<x-guest-layout>
    <div class="flex flex-col w-full h-screen bg-indigo-900">
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

    </div>

    <div class="flex flex-col w-full h-screen bg-pink-500">

    </div>
</x-guest-layout>

