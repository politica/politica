<div class="max-w-4xl mx-auto space-y-5">
    <div class="bg-gray-900 shadow rounded-lg overflow-hidden">
        <div class="h-2">
            <div style="width: {{ ($activeQuestion / count($questions)) * 100 }}%" class="bg-indigo-500 h-full"></div>
        </div>

        <div class="pt-3 px-4 pb-4 sm:pt-6 sm:px-8 sm:pb-8 sm:flex sm:space-x-5">
            <div
                class="inline-flex items-center justify-center sm:h-12 sm:w-12 rounded-md bg-indigo-500 text-white text-base sm:text-xl flex-shrink-0 font-medium p-2 sm:p-0"
            >
                <span class="mx-auto">
                    <span class="inline sm:hidden">Question {{ $activeQuestion + 1 }}</span>
                    <span class="hidden sm:inline">Q{{ $activeQuestion + 1 }}</span>
                </span>
            </div>
            <div class="flex-grow">
                <h3 class="font-medium text-xl flex-grow mt-2">{{ $questions[$activeQuestion]->body }}</h3>
                <div class="mt-3">
                    @foreach ($questions[$activeQuestion]->answers as $index => $answer)
                        <div wire:click="answer({{ $answer->id }})"
                             class="flex space-x-5 cursor-pointer hover:bg-gray-800 transition duration-200 ease-in-out rounded px-4 py-2"
                        >
                            <h4 class="flex-shrink-0 leading-6">{{ strtolower(chr(65 + $index)) }}</h4>
                            <div class="flex-grow">
                                <h4 class="font-medium text-lg">{{ $answer->label }}</h4>
                                <p class="text-sm">{{ $answer->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="flex @if ($activeQuestion) justify-between @else justify-end @endif">
        @if ($activeQuestion)
            <span class="shadow-sm rounded-md">
                <button wire:click="$set('activeQuestion', {{ $activeQuestion - 1 }})" type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray focus:border-gray-700 active:bg-gray-700 transition duration-150 ease-in-out"
                >
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-300" viewBox="0 0 20 20"
                         fill="currentColor"
                    >
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                        />
                    </svg>
                    <span class="inline sm:hidden">Previous</span> <span class="hidden sm:inline">Previous question</span>
                </button>
            </span>
        @endif
        <button wire:click="answer()" type="button"
                class="inline-flex items-center px-4 py-2 text-sm leading-5 font-medium text-white hover:text-gray-200 focus:outline-none transition duration-150 ease-in-out"
        >
            <span class="inline sm:hidden">Skip &rarr;</span> <span class="hidden sm:inline">Skip question &rarr;</span>
        </button>
    </div>
</div>
