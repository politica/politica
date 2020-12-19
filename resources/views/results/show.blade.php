@section('title', ($result->user ? $result->user->name.'\'s ' : '').'Test Results')

<div class="space-y-10">
    <header class="px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl leading-7 text-white font-display sm:text-3xl sm:leading-9 sm:truncate">
                    Test Results
                </h2>

                <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap">
                    <div wire:poll.10s class="flex items-center mt-2 text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        Taken {{ $result->created_at->diffForHumans() }}
                    </div>

                    <div class="flex items-center mt-2 text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        {{ $result->questions_answered }} questions answered
                    </div>
                </div>
            </div>

            <div x-data="{ open: false }" x-cloak
                 class="mt-5 flex lg:mt-0 lg:ml-4 @if ($isParticipant) space-x-3 @endif"
            >
                @if ($isParticipant)
                    <span class="inline-flex rounded-md shadow-sm">
                        <button @click="open = true" type="button"
                                class="inline-flex items-center p-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-400 focus:outline-none focus:border-red-600 focus:shadow-outline-red active:bg-red-600"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                      clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </span>
                @endif

                <div x-show="open"
                     class="fixed inset-x-0 bottom-0 z-10 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center"
                >
                    <div x-show="open" x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity"
                    >
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="open"
                         class="fixed inset-x-0 bottom-0 z-10 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center"
                    >
                        <div x-show="open" x-transition:enter="ease-out duration-300"
                             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                             x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity"
                        >
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <div x-show="open" x-transition:enter="ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave="ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                             class="relative px-4 pt-5 pb-4 overflow-hidden transition-all transform bg-gray-900 rounded-lg shadow-xl sm:max-w-lg sm:w-full sm:p-6"
                             role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                        >
                            <div class="absolute top-0 right-0 z-10 hidden pt-4 pr-4 sm:block">
                                <button @click="open = false" type="button"
                                        class="text-gray-200 transition duration-150 ease-in-out hover:text-gray-300 focus:outline-none focus:text-gray-300"
                                        aria-label="Close"
                                >
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-indigo-600 rounded-full sm:mx-0 sm:h-10 sm:w-10"
                                >
                                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg font-medium leading-6 text-white" id="modal-headline">
                                        Discard your results
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm leading-5 text-gray-300">
                                            Are you sure you want to discard your test results? This action
                                            cannot be undone.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click="discard" @click="open = false" type="button"
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo sm:text-sm sm:leading-5"
                                    >
                                        Discard
                                    </button>
                                </span>
                                <span class="flex w-full mt-3 rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button @click="open = false" type="button"
                                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-gray-700 border border-transparent rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray sm:text-sm sm:leading-5"
                                    >
                                        Continue
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('test') }}"
                       class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-400 focus:outline-none focus:border-indigo-600 focus:shadow-outline-indigo active:bg-indigo-600"
                    >
                        @if ($isParticipant)
                            <svg class="w-5 h-5 mr-3 -ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"
                                ></path>
                            </svg>
                            Retake test
                        @else
                            Take test
                            <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 20 20" fill="currentColor"
                            >
                                <path fill-rule="evenodd"
                                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                      clip-rule="evenodd"
                                ></path>
                            </svg>
                        @endif
                    </a>
                </span>
            </div>
        </div>
    </header>

    <div class="grid-cols-3 gap-8 space-y-8 lg:grid xl:grid-cols-5 lg:px-8 lg:space-y-0">
        <div class="col-span-2 xl:col-span-3 @if ($result->user || $isClaimable) space-y-8 @endif">
            @if ($result->user)
                <div class="px-4 py-4 bg-gray-900 lg:rounded-lg sm:px-6 lg:px-8 sm:py-6">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('users.show', ['user' => $result->user]) }}"
                           class="flex-shrink-0"
                        >
                            <img src="{{ $result->user->avatar }}"
                                 onError="this.onerror = null; this.src = '/images/user.png';"
                                 class="w-16 h-16 rounded-full"
                            />
                        </a>

                        <div class="flex-grow">
                            <h4 class="text-lg font-display sm:text-2xl">{{ $result->user->name }}</h4>

                            <p class="text-sm sm:text-base">
                                <a href="{{ route('users.show', ['user' => $result->user]) }}">
                                    See {{ $isParticipant ? 'your' : '' }} other results
                                    &rarr;
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @elseif ($isClaimable)
                <div class="px-4 py-8 bg-gray-900 sm:px-6 lg:px-8 lg:rounded-lg">
                    <h3 class="text-2xl font-display">Save your results</h3>

                    <h4 class="mx-auto mt-3 text-lg text-gray-200">By signing in, you can access all of your
                        test results from one place, track your beliefs, and much more.</h4>

                    <div class="mt-6 space-y-3 sm:space-x-3 sm:space-y-0 text-center sm:text-left">
                        <span class="rounded-md shadow-sm inline-flex">
                            <button wire:click="claim('discord')" type="button"
                                    class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:outline-none focus:border-gray-600 focus:shadow-outline-gray active:bg-gray-700"
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
                            </button>
                        </span>

                        <br class="sm:hidden" />

                        <span class="rounded-md shadow-sm inline-flex">
                            <button wire:click="claim('twitter')" type="button"
                                    class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-600 focus:shadow-outline-blue active:bg-blue-600"
                            >
                                Sign in with Twitter

                                <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M19.9554745,3.91978102 C19.2212409,4.24540146 18.4321898,4.46547445 17.6040146,4.56445255 C18.4493431,4.05773723 19.0984672,3.25540146 19.4041606,2.29941606 C18.6131387,2.76854015 17.7369343,3.10927007 16.8043796,3.29291971 C16.0575182,2.49722628 14.9935036,2 13.8159854,2 C11.5548905,2 9.72175182,3.83306569 9.72175182,6.0940146 C9.72175182,6.41489051 9.7580292,6.72737226 9.82781022,7.0270073 C6.42518248,6.85627737 3.40846715,5.22635036 1.38919708,2.74941606 C1.03678832,3.35408759 0.834890511,4.05737226 0.834890511,4.80766423 C0.834890511,6.2280292 1.55773723,7.48116788 2.65627737,8.21532847 C1.98510949,8.19408759 1.35386861,8.00992701 0.801824818,7.70328467 C0.801532847,7.72036496 0.801532847,7.73751825 0.801532847,7.75474453 C0.801532847,9.73839416 2.21277372,11.3931387 4.08569343,11.7691971 C3.74211679,11.8627737 3.38043796,11.9127737 3.0070073,11.9127737 C2.74321168,11.9127737 2.48671533,11.8871533 2.23678832,11.8393431 C2.75773723,13.4659124 4.26970803,14.649562 6.06124088,14.6826277 C4.66007299,15.7806569 2.89474453,16.4351825 0.976642336,16.4351825 C0.64620438,16.4351825 0.320291971,16.4158394 0,16.3780292 C1.81182482,17.539635 3.96386861,18.2173723 6.27591241,18.2173723 C13.8064234,18.2173723 17.9243796,11.9789051 17.9243796,6.56875912 C17.9243796,6.39124088 17.920438,6.21467153 17.9125547,6.03912409 C18.7124088,5.46189781 19.4065693,4.74080292 19.9554745,3.91978102"
                                          clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            @endif

            <div class="px-4 py-8 bg-gray-900 sm:px-6 lg:px-8 lg:rounded-lg">
                <div class="space-y-8">
                    @foreach ($axes as $axis)
                        <x-axis :result="$axis" />
                    @endforeach

                    @if ($isParticipant)
                        <div class="text-center sm:text-right">
                            <div
                                class="inline-flex items-center justify-center px-5 py-3 space-x-3 text-white bg-gray-800 rounded"
                            >
                                <p class="flex-shrink-0 text-sm leading-6">
                                    Share your result
                                </p>

                                <a href="https://twitter.com/intent/tweet?text={{ urlencode('I just took the Politica test, check out my results! What did you get? '.route('results.show', ['result' => $result]).' #PoliticaResults') }}"
                                   target="_blank"
                                   class="bg-blue-500 text-white rounded flex-shrink-0 hover:opacity-75 px-2.5 py-1.5 text-xs font-medium space-x-2 leading-4 flex items-center justify-center"
                                >
                                    <span>Tweet</span>
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" version="1.1"
                                         xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="social-icon" fill="#FFFFFF">
                                                <path
                                                    d="M19.9554745,3.91978102 C19.2212409,4.24540146 18.4321898,4.46547445 17.6040146,4.56445255 C18.4493431,4.05773723 19.0984672,3.25540146 19.4041606,2.29941606 C18.6131387,2.76854015 17.7369343,3.10927007 16.8043796,3.29291971 C16.0575182,2.49722628 14.9935036,2 13.8159854,2 C11.5548905,2 9.72175182,3.83306569 9.72175182,6.0940146 C9.72175182,6.41489051 9.7580292,6.72737226 9.82781022,7.0270073 C6.42518248,6.85627737 3.40846715,5.22635036 1.38919708,2.74941606 C1.03678832,3.35408759 0.834890511,4.05737226 0.834890511,4.80766423 C0.834890511,6.2280292 1.55773723,7.48116788 2.65627737,8.21532847 C1.98510949,8.19408759 1.35386861,8.00992701 0.801824818,7.70328467 C0.801532847,7.72036496 0.801532847,7.73751825 0.801532847,7.75474453 C0.801532847,9.73839416 2.21277372,11.3931387 4.08569343,11.7691971 C3.74211679,11.8627737 3.38043796,11.9127737 3.0070073,11.9127737 C2.74321168,11.9127737 2.48671533,11.8871533 2.23678832,11.8393431 C2.75773723,13.4659124 4.26970803,14.649562 6.06124088,14.6826277 C4.66007299,15.7806569 2.89474453,16.4351825 0.976642336,16.4351825 C0.64620438,16.4351825 0.320291971,16.4158394 0,16.3780292 C1.81182482,17.539635 3.96386861,18.2173723 6.27591241,18.2173723 C13.8064234,18.2173723 17.9243796,11.9789051 17.9243796,6.56875912 C17.9243796,6.39124088 17.920438,6.21467153 17.9125547,6.03912409 C18.7124088,5.46189781 19.4065693,4.74080292 19.9554745,3.91978102"
                                                    id="Fill-1"
                                                ></path>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-span-1 px-4 py-8 bg-gray-900 sm:px-6 lg:px-8 lg:rounded-lg xl:col-span-2 space-y-4">
            <h4 class="text-lg font-display sm:text-2xl">Closest Ideologies</h4>

            <div class="space-y-8">
                @foreach ($result->ideologies as $ideology)
                    <div class="space-y-4 @if (! $loop->last) border-b border-white pb-8 @endif">
                        <h4 class="flex items-center justify-between">
                            <span class="font-display text-lg">{{ $ideology->name }}</span>

                            @if ($loop->first)
                                <span
                                    class="ml-3 flex-shrink-0 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium leading-5 bg-indigo-100 text-indigo-800"
                                >
                                    Top Result
                                </span>
                            @endif
                        </h4>
                        <p class="ml-5">
                            {{ $ideology->description }}
                        </p>
                        <p class="text-right">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                                >
                                    More information

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </button>
                            </span>
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
