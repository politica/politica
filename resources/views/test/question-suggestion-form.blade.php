<div class="max-w-3xl mx-auto">
    <div class="flex justify-between items-center">
        <h3 class="font-heading text-white text-2xl">Suggest an Improvement to this Question</h3>

        <button wire:click="$set('suggestionFormOpen', false)" type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700"
        >
            <span class="inline sm:hidden">Cancel</span>
            <span class="hidden sm:inline">Cancel suggestion</span>

            <x-heroicon-s-x class="w-5 h-5 ml-2 -mr-1" />
        </button>
    </div>

    <form wire:submit.prevent="submitSuggestion" class="mt-6">
        <div class="space-y-6">
            <textarea wire:model="suggestionForm.body" rows="2" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md text-lg"></textarea>

            <div class="space-y-3">
                <div>
                    <label for="suggestionForm.description_strongly_agree" class="block text-sm text-gray-200">Strongly agree</label>
                    <input wire:model="suggestionForm.description_strongly_agree" id="suggestionForm.description_strongly_agree" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md" />
                </div>

                <div>
                    <label for="suggestionForm.description_agree" class="block text-sm text-gray-200">Agree</label>
                    <input wire:model="suggestionForm.description_agree" id="suggestionForm.description_agree" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md" />
                </div>

                <div>
                    <label for="suggestionForm.description_neutral" class="block text-sm text-gray-200">Neutral</label>
                    <input wire:model="suggestionForm.description_neutral" id="suggestionForm.description_neutral" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md" />
                </div>

                <div>
                    <label for="suggestionForm.description_disagree" class="block text-sm text-gray-200">Disagree</label>
                    <input wire:model="suggestionForm.description_disagree" id="suggestionForm.description_disagree" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md" />
                </div>

                <div>
                    <label for="suggestionForm.description_strongly_disagree" class="block text-sm text-gray-200">Strongly disagree</label>
                    <input wire:model="suggestionForm.description_strongly_disagree" id="suggestionForm.description_strongly_disagree" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-700 bg-gray-900 text-gray-100 rounded-md" />
                </div>
            </div>
        </div>

        <button type="submit"
                class="mt-6 inline-flex items-center px-6 py-3 text-base font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700"
        >
            <span>Submit suggestion</span>

            <x-heroicon-s-arrow-right class="ml-3 -mr-1 h-5 w-5" />
        </button>
    </form>
</div>
