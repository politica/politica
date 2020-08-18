<div class="max-w-4xl mx-auto space-y-8">
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl leading-9 font-display sm:text-4xl sm:leading-10">
                Trusted by the largest political communities
            </h2>
            <p class="mt-3 text-xl leading-7 text-gray-300 sm:mt-4">
                Politica is the product of a partnership between Discord communities that all strive for the same goal.
                The result is a reliable and useful test that is now in use by thousands of our members.
            </p>
        </div>
    </div>

    <dl class="rounded-lg bg-gray-900 shadow-lg sm:grid sm:grid-cols-3">
        <div
            class="flex flex-col border-b border-gray-600 p-6 text-center sm:border-0 sm:border-r"
        >
            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                questions answered
            </dt>
            <dd x-data="{ current: 0, max: {{ $questionsAnswered }} }"
                x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)"
                x-text="Math.round(current).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '+'"
                class="order-1 text-5xl leading-none font-display text-indigo-500"
            >0
            </dd>
        </div>
        <div
            class="flex flex-col border-t border-b border-gray-600 p-6 text-center sm:border-0 sm:border-l sm:border-r"
        >
            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                communities
            </dt>
            <dd x-data="{ current: 0, max: 9 }"
                x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)"
                x-text="Math.round(current).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                class="order-1 text-5xl leading-none font-display text-indigo-500"
            >0
            </dd>
        </div>
        <div class="flex flex-col border-t border-gray-600 p-6 text-center sm:border-0 sm:border-l">
            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                community members
            </dt>
            <dd x-data="{ current: 0, max: 73125 }"
                x-init="setInterval(() => { if (current < max) { current += (max / 20) } else { current = max } }, 25)"
                x-text="Math.round(current).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '+'"
                class="order-1 text-5xl leading-none font-display text-indigo-500"
            >0
            </dd>
        </div>
    </dl>
</div>
