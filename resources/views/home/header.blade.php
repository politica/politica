<div class="max-w-screen-xl px-4 mx-auto sm:px-6 space-y-12 md:space-y-24">
    <div class="text-center">
        <h2 class="text-4xl font-display sm:text-5xl md:text-6xl space-y-4">
            <div>Explore your</div>
            <div class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 to-indigo-700">
                Political Positions
            </div>
        </h2>
        <p class="max-w-md mx-auto mt-3 text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Politica is a new, innovative political testing platform. It analyses your viewpoints from a wide range of
            perspectives, providing you with tailored information and resources that complement them.
        </p>

        <div class="max-w-md mx-auto sm:flex sm:justify-center mt-8">
            <div class="rounded-md shadow">
{{--                <a href="{{ route('test') }}"--}}
                <a
                   class="cursor-not-allowed w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                >
                    Coming soon
{{--                    Get started--}}

                    <x-heroicon-s-arrow-narrow-right class="-mr-1 ml-3 h-6 w-6" />
                </a>
            </div>
            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                <a href="{{ route('partners.index') }}"
                   class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-indigo-600 bg-white hover:text-indigo-500 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10"
                >
                    Our Partners
                </a>
            </div>
        </div>
    </div>

    <div>
        <h3 class="text-sm font-display tracking-wide text-center text-gray-300 uppercase">Created by the
            largest political communities on Discord</h3>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 mt-8 md:grid-cols-8">
            @foreach ($featuredPartners as $partner)
                <a href="{{ $partner->description ? route('partners.show', ['partner' => $partner]) : $partner->invite }}"
                   class="flex justify-center col-span-1 animate-entry"
                >
                    <img class="h-16" src="{{ media($partner->logo) }}"
                         alt="{{ $partner->name }}"
                    >
                </a>
            @endforeach
        </div>
    </div>
</div>
