<!DOCTYPE html>
<html>
<head>
    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name') }}</title>

    <meta name="title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta name="description" content="An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://politica.group">
    <meta property="og:title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta property="og:description" content="An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions.">
    <meta property="og:image" content="https://politica.group/images/question.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://politica.group">
    <meta property="twitter:title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta property="twitter:description" content="An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions.">
    <meta property="twitter:image" content="https://politica.group/images/question.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('images/icon.png') }}" rel="icon" type="image/png">

    <link href="{{ asset('css/app.css') }}?v=1" rel="stylesheet">
    @livewireStyles

    <script src="{{ asset('js/app.js') }}?v=1" defer></script>
    @livewireScripts
</head>
<body class="flex flex-col min-h-screen overflow-x-hidden text-gray-100 bg-gray-800 select-none"
      style="background: linear-gradient(#252f3f, #374151)"
>
<div>
    <nav x-data="{ open: false }" @keydown.window.escape="open = false" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="border-b border-gray-700">
                <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="font-extrabold text-3xl tracking-widest"
                               style="background: linear-gradient(to right, #f44336, #2196f3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"
                            >
                                ID
                            </a>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <a href="https://discord.gg/4kNrNSX" target="_blank"
                               class="p-1 border-2 border-transparent text-white rounded-full hover:text-gray-100 focus:outline-none focus:text-gray-100 focus:bg-gray-900 transition duration-150 ease-in-out"
                            >
                                <svg class="h-7 w-7" fill="currentColor" class="h-7 w-7"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240"
                                >
                                    <path class="st0"
                                          d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z"
                                    />
                                    <path class="st0"
                                          d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z"
                                    />
                                </svg>
                            </a>

                            @auth
                                <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }" x-cloak>
                                    <div>
                                        <button @click="open = !open"
                                                class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                                                id="user-menu" aria-label="User menu" aria-haspopup="true"
                                                x-bind:aria-expanded="open"
                                        >
                                            <img class="h-8 w-8 rounded-full"
                                                 src="{{ user()->avatar }}"
                                                 onError="this.onerror = null; this.src = '/images/user.png';"
                                            >
                                        </button>
                                    </div>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="origin-top-right absolute z-10 right-0 mt-2 w-48 rounded-md shadow-lg"
                                         style="display: none;"
                                    >
                                        <div class="py-1 rounded-md bg-gray-900 shadow-xs">
                                            <a href="{{ route('users.show', ['user' => user()]) }}"
                                               class="group flex items-center px-4 py-2 text-sm text-gray-300 hover:text-gray-100"
                                            >
                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                                <span>My profile</span>
                                            </a>

                                            <a href="{{ route('auth.logout') }}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                               class="group flex items-center px-4 py-2 text-sm text-gray-300 hover:text-gray-100"
                                            >
                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                <span>Sign out</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endauth
                            @guest
                                <span class="ml-3 inline-flex rounded-md shadow-sm">
                                    <a href="{{ route('auth') }}"
                                       class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium rounded-md text-gray-100 bg-gray-900 hover:bg-gray-100 hover:text-gray-900 focus:outline-none active:bg-gray-100 active:text-gray-900 transition ease-in-out duration-500"
                                    >
                                        Sign in
                                    </a>
                                </span>
                            @endguest
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="open = !open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
                                x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open"
                                aria-label="Main menu"
                        >
                            <svg :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" stroke="currentColor"
                                 fill="none" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"
                                ></path>
                            </svg>
                            <svg :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6"
                                 stroke="currentColor" fill="none" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div :class="{ 'block': open, 'hidden': !open }" class="hidden border-b border-gray-700 md:hidden">
            <div class="pt-4 pb-3 border-t border-gray-700">
                @auth
                    <a href="{{ route('users.show', ['user' => user()]) }}" class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full"
                                 src="{{ user()->avatar }}"
                                 onError="this.onerror = null; this.src = '/images/user.png';"
                            >
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">{{ user()->name }}</div>
                        </div>
                    </a>
                    <div class="mt-3 px-2" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                        <a href="{{ route('auth.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                           role="menuitem"
                        >Sign out
                        </a>
                    </div>
                @endauth
                @guest
                    <div class="px-2">
                        <a href="{{ route('auth') }}"
                           class="block text-center px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700"
                        >Sign in
                        </a>
                    </div>
                @endguest
            </div>
        </div>

        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">@csrf</form>
    </nav>
</div>

<main class="flex-grow">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </div>
</main>

<footer class="bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <p class="text-gray-200 text-center">
            Any suggestions? Got an unexpected test result? Contact <strong>spaniel#0001</strong> on Discord.
        </p>

        <p class="mt-2 text-sm text-gray-300 text-center">
            &copy; {{ carbon()->year }} <a href="{{ route('home') }}">{{ config('app.name') }}</a>. All rights reserved.
        </p>
    </div>
</footer>
</body>
</html>
