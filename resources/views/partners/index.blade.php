@section('title', 'Partners')

<div class="px-4 sm:px-6 lg:px-8 mb-16 space-y-16">
    <div>
        <h2 class="text-4xl text-center text-white font-display sm:text-5xl sm:truncate">
            Our Partners
        </h2>
    </div>

    <div class="space-y-20">
        @foreach($partners as $partner)
            <div class="lg:flex lg:items-center">
                <div class="lg:flex-shrink-0">
                    <img
                        class="w-32 h-32 sm:w-40 sm:h-40 rounded-full xl:h-56 xl:w-56 mx-auto lg:mx-0"
                        src="/images/partner-logos/{{ $partner->logo }}"
                        alt="{{ $partner->name }}"
                    >
                </div>

                <div class="space-y-4 lg:ml-10 mt-4 lg:mt-0">
                    <div class="text-2xl font-medium leading-9 text-center lg:text-left">
                        {{ $partner->name }}
                    </div>
                    <p class="text-gray-200 text-center lg:text-left max-w-xl mx-auto lg:max-w-none lg:mx-0">
                        {{ $partner->description }}
                    </p>
                    <footer class="space-x-3 text-center lg:text-left">
                        <span class="inline-flex rounded-md shadow-sm">
                            <a href="{{ $partner->invite }}" target="_blank"
                               class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"
                            >
                                Join
                                <svg class="ml-3 -mr-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                          clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </a>
                        </span>

                        @if ($partner->description)
                            <span class="inline-flex rounded-md shadow-sm">
                                <a href="{{ route('partners.show', ['partner' => $partner]) }}"
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-base leading-6 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                                >
                                    More information
                                </a>
                            </span>
                        @endif
                    </footer>
                </div>
            </div>
        @endforeach
    </div>
</div>
