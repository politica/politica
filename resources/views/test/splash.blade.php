<div class="text-center mx-auto sm:mt-20 space-y-6">
    <h3 class="font-display text-4xl animate-entry">Ready to begin?</h3>

    <div class="space-y-6 text-lg text-gray-200 max-w-2xl mx-auto">
        <p>
            The test will assess your political views on a wide range of topic areas.
        </p>

        <p>
            A series of statements will be presented to you. Click the viewpoint that you feel most strongly aligned
            with.
        </p>

        <p>
            For each statement, use the slider to dictate how important this issue is to you.
        </p>
    </div>

    <div>
        <span class="inline-flex rounded-md shadow-sm">
            <button wire:click="$set('questionIndex', 0)" type="button"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
            >
                <span>Start the test</span>

                <svg class="ml-3 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                >
                    <path fill-rule="evenodd"
                          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </span>
    </div>
</div>
