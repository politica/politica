@section('title', $test->name.' | '.$test->category->name.' | Tests')

<div>
    <header class="py-10">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $test->name }}
                </h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        {{ count($test->questions) }} {{ count($test->questions) != 1 ? 'questions' : 'question' }}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path>
                            <path fill-rule="evenodd"
                                  d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        {{ $test->category->name }}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                            <path fill-rule="evenodd"
                                  d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        {{ count($test->results) }} {{ count($test->results) != 1 ? 'people have' : 'person has' }} taken this test
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-300 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                        Last updated {{ $test->updated_at->toFormattedDateString() }}
                    </div>
                </div>
            </div>

            <div x-data="{ discardOpen: false }" x-cloak class="mt-5 flex lg:mt-0 lg:ml-4">
                @if (is_null($activeQuestion))
                    <div>
                        @if ($result)
                            <span class="inline-flex rounded-md shadow-sm">
                                <button @click="discardOpen = true" type="button"
                                        class="inline-flex items-center p-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:border-red-600 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                                >
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </button>
                            </span>

                            <div x-show="discardOpen"
                                 class="fixed z-10 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center"
                            >
                                <div x-show="discardOpen" x-transition:enter="ease-out duration-300"
                                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
                                     x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity"
                                >
                                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                </div>

                                <div x-show="discardOpen" x-transition:enter="ease-out duration-300"
                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave="ease-in duration-200"
                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                     class="relative bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                                     role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                                >
                                    <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4 z-10">
                                        <button @click="discardOpen = false" type="button"
                                                class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150"
                                                aria-label="Close"
                                        >
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
                                        >
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                                ></path>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                                Discard your results
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm leading-5 text-gray-500">
                                                    Are you sure you want to discard your test results? This action cannot be undone.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                            <button wire:click="discard" @click="discardOpen = false" type="button"
                                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            >
                                                Discard
                                            </button>
                                        </span>
                                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                            <button @click="discardOpen = false" type="button"
                                                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            >
                                                Cancel
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <span class="inline-flex ml-3 rounded-md shadow-sm">
                                <button wire:click="start" type="button"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-600 focus:shadow-outline-indigo active:bg-indigo-600 transition ease-in-out duration-150"
                                >
                                    <svg class="-ml-1 mr-3 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                              clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    Retake test
                                </button>
                            </span>
                        @else
                            <span class="inline-flex rounded-md shadow-sm">
                                <button wire:click="start" type="button"
                                        class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:border-indigo-600 focus:shadow-outline-indigo active:bg-indigo-600 transition ease-in-out duration-150"
                                >
                                    @if (user()) Start test @else Sign in to start test @endif
                                    <svg class="ml-3 -mr-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                              clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </div>
                @else
                    <span class="inline-flex rounded-md shadow-sm">
                        <button wire:click="$set('activeQuestion', null)" type="button"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:border-red-600 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150"
                        >
                            Cancel test
                            <svg class="ml-3 -mr-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </span>
                @endif
            </div>
        </div>
    </header>

    <div>
        @if (is_null($activeQuestion))
            <div class="lg:grid grid-cols-5 lg:space-x-5 space-y-5 lg:space-y-0">
                <div class="col-span-3 space-y-5">
                    <div>
                        @if ($result)
                            <div>
                                @include('tests.show.my-results')
                            </div>
                        @elseif (! user())
                            <div>
                                @include('tests.show.sign-in')
                            </div>
                        @else
                            <div>
                                @include('tests.show.start')
                            </div>
                        @endif
                    </div>

                    @include('tests.show.community-results')
                </div>

                <div class="col-span-2">
                    @include('tests.show.other-tests')
                </div>
            </div>
        @else
            <div>
                @include('tests.show.questions')
            </div>
        @endif
    </div>
</div>
