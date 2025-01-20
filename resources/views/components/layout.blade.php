<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="./views/js/script.js"></script> --}}
    <link rel="icon" href="./assets/favicon/Chrome.ico">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <title>Portfolio Damian</title>
</head>

<body>
<header>
    <h1 class="text-center bg-[rgb(0,128,255)] p-[10px] text-white m-0 text-2xl font-bold" id="title">Portfolio Damian</h1>
    <nav class="navbar flex">
        <a class="link" href="/">Home</a>
        <a class="link" href="/projects">Projects</a>
        <a class="link" href="/contact">Contact</a>
        <a class="link" href="/ttg">TTG</a>
        @if (Auth::check())
        <ul class="ml-auto p-1">
        <x-dropdown width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
        
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>
        
            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </ul>
        @else
        <ul class="flex ml-auto p-1">
        <li class="flex">
            <a class="text-sm flex-1 sm:text-base pr-2 hover:text-sky-900 hover:underline" href="/register">
                <i class="fa-solid fa-plus"></i> Register
            </a>
        </li>
        <li>
            <a class="text-sm flex-1 sm:text-base pr-2 hover:text-sky-900 hover:underline" href="/login">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
            </a>
        </li>
    </ul>
        @endif
</nav>
</header>
<main id="content" class="content">
    {{ $slot }}
</main>
<footer class="footer" id="footer">
    &copy; Damian Hulsman 2024
</footer>
</body>

</html>