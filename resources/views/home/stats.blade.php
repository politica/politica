<div x-init="interval = setInterval(() => {
    const rect = $el.getBoundingClientRect()
    if ((rect.bottom < 0) || (rect.top >= window.innerHeight)) return
    clearInterval(interval)
    setInterval(() => { if (currentCommunityMembers < maxCommunityMembers) { currentCommunityMembers += (maxCommunityMembers / 30) } else { currentCommunityMembers = maxCommunityMembers } }, 50)
    setInterval(() => { if (currentPartners < maxPartners) { currentPartners += (maxPartners / 30) } else { currentPartners = maxPartners } }, 50)
    setInterval(() => { if (currentQuestionsAnswered < maxQuestionsAnswered) { currentQuestionsAnswered += (maxQuestionsAnswered / 30) } else { currentQuestionsAnswered = maxQuestionsAnswered } }, 50)
}, 50)" x-data="{
    currentCommunityMembers: 0,
    currentPartners: 0,
    currentQuestionsAnswered: 0,
    interval: null,
    maxCommunityMembers: 66423,
    maxPartners: {{ $stats->partners }},
    maxQuestionsAnswered: {{ $stats->answeredQuestions }},
}" class="max-w-4xl mx-auto space-y-8">
    <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl leading-9 font-display sm:text-4xl sm:leading-10">
            Trusted by the largest political communities
        </h2>
        <p class="mt-3 text-xl leading-7 text-gray-300 sm:mt-4">
            Politica is the product of a partnership between Discord communities that all strive for the same goal.
            The result is a reliable and useful test that is now in use by thousands of our members.
        </p>
    </div>

    <dl class="rounded-lg bg-gray-900 shadow-lg sm:grid sm:grid-cols-3">
        <div
            class="flex flex-col border-b border-gray-600 p-6 text-center sm:border-0 sm:border-r"
        >
            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                questions answered
            </dt>
            <dd x-text="Math.round(currentQuestionsAnswered).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '+'"
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
            <dd x-text="Math.round(currentPartners).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                class="order-1 text-5xl leading-none font-display text-indigo-500"
            >0
            </dd>
        </div>

        <div class="flex flex-col border-t border-gray-600 p-6 text-center sm:border-0 sm:border-l">
            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-300">
                community members
            </dt>
            <dd x-text="Math.round(currentCommunityMembers).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + '+'"
                class="order-1 text-5xl leading-none font-display text-indigo-500"
            >0
            </dd>
        </div>
    </dl>
</div>
