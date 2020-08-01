<div class="max-w-screen-xl mx-auto px-4">
    <div class="pb-12 sm:pb-16">
        <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <dl class="rounded-lg bg-gray-900 shadow-lg sm:grid sm:grid-cols-3">
                    <div class="flex flex-col border-b border-gray-600 p-6 text-center sm:border-0 sm:border-r">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300" id="item-1">
                            questions answered
                        </dt>
                        <dd x-data="{ current: 0, max: {{ $questions_answered }} }" x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)" x-text="Math.round(current)" class="order-1 text-5xl leading-none font-extrabold text-indigo-500">0</dd>
                    </div>
                    <div
                        class="flex flex-col border-t border-b border-gray-600 p-6 text-center sm:border-0 sm:border-l sm:border-r"
                    >
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                            tests taken
                        </dt>
                        <dd x-data="{ current: 0, max: {{ $tests_taken }} }" x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)" x-text="Math.round(current)" class="order-1 text-5xl leading-none font-extrabold text-indigo-500">0</dd>
                    </div>
                    <div class="flex flex-col border-t border-gray-600 p-6 text-center sm:border-0 sm:border-l">
                        <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                            community members
                        </dt>
                        <dd x-data="{ current: 0, max: 1000 }" x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)" x-text="Math.round(current) + '+'" class="order-1 text-5xl leading-none font-extrabold text-indigo-500">0</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
