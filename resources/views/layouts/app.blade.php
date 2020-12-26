<!DOCTYPE html>
<html>
<head>
    <title>@isset($title) {{ $title }} | @endif {{ config('app.name') }}</title>

    <meta name="title" content="@isset($title) {{ $title }} | @endif {{ config('app.name') }}">
    <meta name="description"
          content="@isset($description) {{ $description }} @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="@isset($title) {{ $title }} | @endif {{ config('app.name') }}">
    <meta property="og:description"
          content="@isset($description) {{ $description }} @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="og:image"
          content="@isset($image) {{ $image }} @else {{ config('app.url') }}/images/question.png @endif"
    >
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="@isset($title) {{ $title }} | @endif {{ config('app.name') }}">
    <meta property="twitter:description"
          content="@isset($description) {{ $description }} @else An innovative political test platform and community, with a diverse set of online tests to accurately determine your political positions. @endif"
    >
    <meta property="twitter:image"
          content="@isset($image) {{ $image }} @else {{ config('app.url') }}/images/question.png @endif"
    >

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireScripts
</head>
<body
    class="flex flex-col min-h-screen overflow-x-hidden text-gray-100 bg-gray-800"
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
{{--                        <a href="{{ route('test') }}"--}}
{{--                           class="font-medium text-white transition duration-150 ease-in-out hover:text-gray-300"--}}
{{--                        >Take Test--}}
{{--                        </a>--}}
{{--                        <a href="#"--}}
{{--                           class="font-medium text-white transition duration-150 ease-in-out hover:text-gray-300"--}}
{{--                        >Discover--}}
{{--                        </a>--}}
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
                        <span class="rounded-md shadow-sm inline-flex">
                            <a href="{{ route('auth.index') }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium leading-6 text-white transition duration-150 ease-in-out bg-gray-900 border border-transparent rounded-md hover:bg-gray-700 focus:outline-none focus:border-gray-600 focus:shadow-outline-gray active:bg-gray-700"
                            >
                                Sign in with Discord

                                <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="m3.58 21.196h14.259l-.681-2.205 1.629 1.398 1.493 1.338 2.72 2.273v-21.525c-.068-1.338-1.22-2.475-2.648-2.475l-16.767.003c-1.427 0-2.585 1.139-2.585 2.477v16.24c0 1.411 1.156 2.476 2.58 2.476zm10.548-15.513-.033.012.012-.012zm-7.631 1.269c1.833-1.334 3.532-1.27 3.532-1.27l.137.135c-2.243.535-3.26 1.537-3.26 1.537s.272-.133.747-.336c3.021-1.188 6.32-1.102 9.374.402 0 0-1.019-.937-3.124-1.537l.186-.183c.291.001 1.831.055 3.479 1.26 0 0 1.844 3.15 1.844 7.02-.061-.074-1.144 1.666-3.931 1.726 0 0-.472-.534-.808-1 1.63-.468 2.24-1.404 2.24-1.404-.535.337-1.023.537-1.419.737-.609.268-1.219.4-1.828.535-2.884.468-4.503-.315-6.033-.936l-.523-.266s.609.936 2.174 1.404c-.411.469-.818 1.002-.818 1.002-2.786-.066-3.802-1.806-3.802-1.806 0-3.876 1.833-7.02 1.833-7.02z"
                                          clip-rule="evenodd"
                                    />
                                    <path
                                        d="m14.308 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.576-1.335-1.29-1.335v.003c-.708 0-1.288.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"
                                    />
                                    <path
                                        d="m9.69 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.575-1.335-1.286-1.335l-.004.003c-.711 0-1.29.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"
                                    />
                                </svg>
                            </a>
                        </span>
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
{{--                            <a href="{{ route('test') }}"--}}
{{--                               class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"--}}
{{--                               role="menuitem"--}}
{{--                            >Take Test--}}
{{--                            </a>--}}
{{--                            <a href="#"--}}
{{--                               class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"--}}
{{--                               role="menuitem"--}}
{{--                            >Discover--}}
{{--                            </a>--}}
                            <a href="{{ route('partners.index') }}"
                               class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"
                               role="menuitem"
                            >Our Partners
                            </a>
                            @auth
{{--                                <a href="{{ route('users.show', ['user' => user()]) }}"--}}
{{--                                   class="block px-3 py-2 text-base font-medium text-gray-700 transition duration-150 ease-in-out rounded-md hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50"--}}
{{--                                   role="menuitem"--}}
{{--                                >My Profile--}}
{{--                                </a>--}}
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
                                >Sign in with Discord
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">@csrf</form>
        </div>

        <main class="flex-grow w-full mx-auto max-w-7xl pt-12">
            {{ $slot }}
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
