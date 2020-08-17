<div class="self-center w-full max-w-4xl mx-auto space-y-8">
    {{-- For some reason, Alpine isn't being initialised on the first child element, so here's a dummy --}}
    <div></div>

    <div>
        @if (count($responses) >= $requiredQuestionsCount && $questionIndex + 1 < count($questions))
            <div x-data="{ open: false }" class="text-right">
                <span class="inline-flex rounded-md shadow-sm">
                    <button @click="open = true" type="button"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700"
                    >
                        <span class="inline sm:hidden">End</span>
                        <span class="hidden sm:inline">End test</span>

                        <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"
                            ></path>
                            <path fill-rule="evenodd"
                                  d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </span>

                <div x-show="open"
                     class="fixed z-10 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center"
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
                         class="relative bg-gray-900 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6"
                         role="dialog" aria-modal="true" aria-labelledby="modal-headline"
                    >
                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4 z-10">
                            <button @click="open = false" type="button"
                                    class="text-gray-200 hover:text-gray-300 focus:outline-none focus:text-gray-300 transition ease-in-out duration-150"
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
                                class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-600 sm:mx-0 sm:h-10 sm:w-10"
                            >
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-white" id="modal-headline">
                                    End the test
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm leading-5 text-gray-300">
                                        Are you sure you would like to end the test without answering any more
                                        questions? The more questions you answer, the more accurate your results will
                                        be.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="calculateResult" @click="open = false" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                >
                                    End test
                                </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                <button @click="open = false" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-700 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                >
                                    Continue
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="overflow-hidden bg-gray-900 rounded-lg shadow">
        <div class="h-2">
            <div style="width: {{ ($questionIndex / count($questions)) * 100 }}%" class="h-full bg-indigo-500"
            ></div>
        </div>

        <div class="px-4 pt-3 pb-4 sm:pt-6 sm:px-8 sm:pb-8 sm:flex sm:space-x-5">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 p-2 text-base font-medium text-white bg-indigo-500 rounded-md sm:h-12 sm:w-12 sm:text-xl sm:p-0"
            >
                <span class="mx-auto">
                    <span class="inline sm:hidden">Question {{ $questionIndex + 1 }}</span>
                    <span class="hidden sm:inline">Q{{ $questionIndex + 1 }}</span>
                </span>
            </div>
            <div class="flex-grow">
                <h3 class="mt-2 text-xl font-medium">{{ $this->question->body }}</h3>

                <div>
                    @if ($this->question->more_information)
                        <div x-data="{ open: false }" @click="open = ! open" @click.away="open = false"
                             class="p-2 mt-3 transition duration-200 ease-in-out bg-indigo-600 rounded cursor-pointer hover:bg-indigo-700"
                        >
                            <h4 class="flex items-center">
                                <svg class="w-4 h-4 mr-2" viewBox="0 0 20 20" fill="currentColor"
                                >
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"
                                    ></path>
                                </svg>

                                <span class="font-medium">More information</span>
                            </h4>

                            <p x-show="open" class="mt-1 mx-6 text-sm">
                                {{ $this->question->more_information }}
                            </p>
                        </div>
                    @endif
                </div>

                <div class="mt-3">
                    <div wire:click="respond('stronglyAgree')"
                         class="flex px-4 py-2 space-x-5 transition duration-200 ease-in-out rounded cursor-pointer hover:bg-gray-800"
                    >
                        <h4 class="flex-shrink-0 leading-6">a</h4>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium">Strongly agree</h4>
                            <p class="text-sm">{{ $this->question->description_strongly_agree }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div wire:click="respond('agree')"
                         class="flex px-4 py-2 space-x-5 transition duration-200 ease-in-out rounded cursor-pointer hover:bg-gray-800"
                    >
                        <h4 class="flex-shrink-0 leading-6">b</h4>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium">Agree</h4>
                            <p class="text-sm">{{ $this->question->description_agree }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div wire:click="respond('neutral')"
                         class="flex px-4 py-2 space-x-5 transition duration-200 ease-in-out rounded cursor-pointer hover:bg-gray-800"
                    >
                        <h4 class="flex-shrink-0 leading-6">c</h4>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium">Neutral</h4>
                            <p class="text-sm">{{ $this->question->description_neutral }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div wire:click="respond('disagree')"
                         class="flex px-4 py-2 space-x-5 transition duration-200 ease-in-out rounded cursor-pointer hover:bg-gray-800"
                    >
                        <h4 class="flex-shrink-0 leading-6">d</h4>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium">Disagree</h4>
                            <p class="text-sm">{{ $this->question->description_disagree }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div wire:click="respond('stronglyDisagree')"
                         class="flex px-4 py-2 space-x-5 transition duration-200 ease-in-out rounded cursor-pointer hover:bg-gray-800"
                    >
                        <h4 class="flex-shrink-0 leading-6">e</h4>
                        <div class="flex-grow">
                            <h4 class="text-lg font-medium">Strongly disagree</h4>
                            <p class="text-sm">{{ $this->question->description_strongly_disagree }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-3">
        <div class="flex justify-between text-sm">
            <p>Least important</p>

            <p>Most important</p>
        </div>

        <input wire:model="importance" type="range" min="0" max="10" class="w-full bg-transparent" />
    </div>

    <div class="flex @if ($questionIndex) justify-between @else justify-end @endif">
        @if ($questionIndex)
            <span class="rounded-md shadow-sm">
                <button wire:click="previousQuestion" type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray focus:border-gray-700 active:bg-gray-700"
                >
                    <svg class="w-5 h-5 mr-2 -ml-1 text-gray-300" viewBox="0 0 20 20"
                         fill="currentColor"
                    >
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                        />
                    </svg>
                    <span class="inline sm:hidden">Previous</span>
                    <span class="hidden sm:inline">Previous question</span>
                </button>
            </span>
        @endif

        <div class="space-x-3">
            @unless($this->question->is_required && ! array_key_exists($questionIndex, $responses))
                <button wire:click="nextQuestion" type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-600 border border-transparent rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray focus:border-gray-700 active:bg-gray-700"
                >
                    <span class="inline sm:hidden">Skip</span>
                    <span class="hidden sm:inline">Skip question</span>

                    <svg class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
            @endunless
        </div>
    </div>
</div>
