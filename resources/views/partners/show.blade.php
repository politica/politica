@section('title', $partner->name.' | Partners')
@section('description', $partner->description)
@section('image', config('app.url').'/images/partner-logos/'.$partner->logo)

<div class="mb-16 space-y-20">
    <header class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center sm:justify-between sm:space-x-8">
            <div class="flex-shrink-0">
                <img src="{{ media($partner->logo) }}"
                     class="w-32 h-32 mx-auto rounded-full sm:mx-0"
                />
            </div>

            <div class="flex-grow min-w-0 mt-4 text-center sm:text-left sm:mt-0">
                <a href="{{ route('partners.index') }}"
                   class="hidden mb-1 text-gray-300 transition duration-150 ease-in-out sm:block hover:text-gray-200"
                >Partners
                </a>
                <h2 class="text-2xl leading-7 text-white font-display sm:text-3xl sm:leading-9 sm:truncate">
                    {{ $partner->name }}
                </h2>
            </div>

            <div class="flex mt-5 sm:mt-0 sm:ml-4">
                <span class="inline-flex mx-auto rounded-md shadow-sm sm:mx-0">
                    <a href="{{ $partner->invite }}"
                       class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-400 focus:outline-none focus:border-indigo-600 focus:shadow-outline-indigo active:bg-indigo-600"
                    >
                        <span>Join
                            <span class="hidden md:inline">community</span>
                        </span>

                        <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 20 20" fill="currentColor"
                        >
                            <path fill-rule="evenodd"
                                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                  clip-rule="evenodd"
                            ></path>
                        </svg>
                    </a>
                </span>
            </div>
        </div>
    </header>

    <div class="max-w-xl px-4 mx-auto lg:max-w-screen-lg sm:px-6 lg:px-8">
        <div class="p-4 bg-gray-900 rounded-lg sm:p-6 lg:p-8">
            <h2 class="text-xl text-center font-display sm:text-2xl">
                About the Server
            </h2>

            <p class="mt-3 text-sm text-gray-200 sm:text-base">{{ $partner->description }}</p>
        </div>
    </div>

    <div class="max-w-xl px-4 mx-auto sm:px-6 lg:max-w-screen-xl lg:px-8">
        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
            <div>
                @if ($partner->feature_1_icon)
                    <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
                        <x-dynamic-component :component="'heroicon-'.$partner->feature_1_icon" class="w-6 h-6" />
                    </div>
                @endif

                <div class="mt-5">
                    <h5 class="text-lg font-medium leading-6">{{ $partner->feature_1_label }}</h5>
                    <p class="mt-2 text-base leading-6 text-gray-300">
                        {{ $partner->feature_1_description }}
                    </p>
                </div>
            </div>
            <div class="mt-10 lg:mt-0">
                @if ($partner->feature_2_icon)
                    <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
                        <x-dynamic-component :component="'heroicon-'.$partner->feature_2_icon" class="w-6 h-6" />
                    </div>
                @endif

                <div class="mt-5">
                    <h5 class="text-lg font-medium leading-6">{{ $partner->feature_2_label }}</h5>
                    <p class="mt-2 text-base leading-6 text-gray-300">
                        {{ $partner->feature_2_description }}
                    </p>
                </div>
            </div>
            <div class="mt-10 lg:mt-0">
                @if ($partner->feature_3_icon)
                    <div class="flex items-center justify-center w-12 h-12 text-white bg-indigo-500 rounded-md">
                        <x-dynamic-component :component="'heroicon-'.$partner->feature_3_icon" class="w-6 h-6" />
                    </div>
                @endif

                <div class="mt-5">
                    <h5 class="text-lg font-medium leading-6">{{ $partner->feature_3_label }}</h5>
                    <p class="mt-2 text-base leading-6 text-gray-300">
                        {{ $partner->feature_3_description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="relative max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8 lg:py-20">
        <div class="relative lg:flex lg:items-center">
            <div class="hidden lg:block lg:flex-shrink-0">
                <img class="w-64 h-64 rounded-full xl:h-80 xl:w-80"
                     src="{{ media($partner->reviewer_avatar) }}" alt="{{ $partner->reviewer_name }}"
                />
            </div>

            <div class="relative lg:ml-10">
                <svg
                    class="absolute top-0 left-0 text-indigo-400 transform -translate-x-8 -translate-y-24 opacity-50 h-36 w-36"
                    stroke="currentColor" fill="none" viewBox="0 0 144 144"
                >
                    <path stroke-width="2"
                          d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"
                    />
                </svg>
                <blockquote class="relative">
                    <div class="text-2xl font-medium leading-9">
                        <p>
                            {{ $partner->review }}
                        </p>
                    </div>
                    <footer class="mt-8">
                        <div class="flex">
                            <div class="flex-shrink-0 lg:hidden">
                                <img class="w-12 h-12 rounded-full"
                                     src="/images/reviewer-avatars/{{ $partner->reviewer_avatar }}"
                                     alt="{{ $partner->reviewer_name }}"
                                />
                            </div>
                            <div class="ml-4 lg:ml-0">
                                <div class="text-lg font-medium leading-6">{{ $partner->reviewer_name }}</div>
                                <div class="text-base font-medium leading-6 text-indigo-400">
                                    Member, {{ $partner->name }}
                                </div>
                            </div>
                        </div>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>
