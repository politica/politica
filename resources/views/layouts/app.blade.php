<!DOCTYPE html>
<html>
<head>
    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name') }}</title>

    <meta name="title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta name="description"
          content="@hasSection('description') @yield('description') @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta property="og:description"
          content="@hasSection('description') @yield('description') @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="og:image"
          content="@hasSection('image') @yield('image') @else {{ config('app.url') }}/images/question.png @endif"
    >
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="@hasSection('title') @yield('title') | @endif {{ config('app.name') }}">
    <meta property="twitter:description"
          content="@hasSection('description') @yield('description') @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="twitter:image"
          content="@hasSection('image') @yield('image') @else {{ config('app.url') }}/images/question.png @endif"
    >

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles

    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
</head>
<body class="flex flex-col min-h-screen overflow-x-hidden text-gray-100 bg-gray-800 select-none"
      style="background: linear-gradient(#252f3f, #374151)"
>
<div class="relative overflow-hidden">
    <div class="hidden sm:block sm:absolute sm:inset-0">
        <svg
            class="absolute bottom-0 right-0 mb-48 text-gray-700 transform translate-x-1/2 lg:top-0 lg:mt-28 lg:mb-0 xl:transform-none xl:translate-x-0"
            width="364" height="384" viewBox="0 0 364 384" fill="none"
        >
            <defs>
                <pattern id="eab71dd9-9d7a-47bd-8044-256344ee00d0" x="0" y="0" width="20" height="20"
                         patternUnits="userSpaceOnUse"
                >
                    <rect x="0" y="0" width="4" height="4" fill="currentColor"></rect>
                </pattern>
            </defs>
            <rect width="364" height="384" fill="url(#eab71dd9-9d7a-47bd-8044-256344ee00d0)"></rect>
        </svg>
    </div>
    <div x-data="{ open: false }" class="relative flex flex-col min-h-screen pt-6">
        <div>
            <nav class="relative flex items-center justify-between max-w-screen-xl px-4 mx-auto sm:px-6">
                <div class="flex items-center flex-1">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="/" class="inline-flex items-center -mt-1 space-x-3">
                            <img class="w-auto h-12" src="/images/icon.svg" alt="">
                            <span class="text-2xl font-display">Politica</span>
                        </a>
                        <div class="flex items-center -mr-2 md:hidden">
                            <button @click="open = true" type="button"
                                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                                    id="main-menu" aria-label="Main menu" aria-haspopup="true"
                                    x-bind:aria-expanded="open"
                            >
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="hidden space-x-10 md:flex md:ml-10">
                        <a href="{{ route('test') }}"
                           class="font-medium text-white transition duration-150 ease-in-out hover:text-gray-300"
                        >Take Test
                        </a>
                        {{--<a href="#"--}}
                        {{--   class="font-medium text-white transition duration-150 ease-in-out hover:text-gray-300"--}}
                        {{-->Discover--}}
                        {{--</a>--}}
                        <a href="{{ route('partners.index') }}"
                           class="font-medium text-white transition duration-150 ease-in-out hover:text-gray-300"
                        >Our Partners
                        </a>
                    </div>
                </div>
                <div class="hidden md:flex">
                    @auth
                        <div @click.away="open = false" class="relative" x-data="{ open: false }" x-cloak>
                            <div>
                                <button @click="open = !open"
                                        class="flex items-center max-w-xs text-sm text-white rounded-full focus:outline-none focus:shadow-solid"
                                        id="user-menu" aria-label="User menu" aria-haspopup="true"
                                        x-bind:aria-expanded="open"
                                >
                                    <img class="w-8 h-8 rounded-full"
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
                                 class="absolute right-0 z-10 w-48 mt-2 origin-top-right rounded-md shadow-lg"
                                 style="display: none;"
                            >
                                <div class="py-1 bg-gray-900 rounded-md shadow-xs">
                                    <a href="{{ route('users.show', ['user' => user()]) }}"
                                       class="flex items-center px-4 py-2 text-sm text-gray-300 group hover:text-gray-100"
                                    >
                                        <svg
                                            class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500"
                                            fill="currentColor" viewBox="0 0 20 20"
                                        >
                                            <path fill-rule="evenodd"
                                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                                  clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span>My profile</span>
                                    </a>

                                    <a href="{{ route('auth.logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="flex items-center px-4 py-2 text-sm text-gray-300 group hover:text-gray-100"
                                    >
                                        <svg
                                            class="w-5 h-5 mr-3 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500"
                                            fill="currentColor" viewBox="0 0 20 20"
                                        >
                                            <path fill-rule="evenodd"
                                                  d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                                  clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span>Sign out</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <a href="{{ route('auth.index') }}"
                           class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray focus:border-gray-700 active:bg-gray-700"
                        >
                            Log in
                        </a>
                    @endguest
                </div>
            </nav>

            <div x-show="open" x-description="Mobile menu, show/hide based on menu open state."
                 x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
                 x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                 class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden"
                 style="display: none;"
            >
                <div class="rounded-lg shadow-md">
                    <div class="overflow-hidden bg-white rounded-lg shadow-xs" role="menu" aria-orientation="vertical"
                         aria-labelledby="main-menu"
                    >
                        <div class="flex items-center justify-between px-5 pt-4">
                            <div>
                                <a href="/" class="inline-flex items-center space-x-3">
                                    <img class="w-auto h-12" src="/images/icon.svg" alt="">
                                    <span class="text-2xl text-gray-900 font-display">Politica</span>
                                </a>
                            </div>
                            <div class="-mr-2">
                                <button @click="open = false" type="button"
                                        class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                                        aria-label="Close menu"
                                >
                                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3 space-y-1">
                            <a href="{{ route('test') }}"
                               class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                               role="menuitem"
                            >Take Test
                            </a>
                            {{--<a href="#"--}}
                            {{--   class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"--}}
                            {{--   role="menuitem"--}}
                            {{-->Discover--}}
                            {{--</a>--}}
                            <a href="{{ route('partners.index') }}"
                               class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                               role="menuitem"
                            >Our Partners
                            </a>
                            @auth
                                <a href="{{ route('users.show', ['user' => user()]) }}"
                                   class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                                   role="menuitem"
                                >My Profile
                                </a>
                                <a href="{{ route('auth.logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                                   class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                                   role="menuitem"
                                >Sign Out
                                </a>
                            @endauth
                            @guest
                                <a href="{{ route('auth.index') }}"
                                   class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                                   role="menuitem"
                                >Log in
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>

        <main class="flex-grow w-full mx-auto max-w-7xl pt-12">
            @yield('content')
        </main>

        <footer class="mt-10 bg-gray-900">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <p class="text-sm text-center text-gray-300">
                    &copy; {{ carbon()->year }}
                    <a href="/">{{ config('app.name') }}.</a>
                    All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
