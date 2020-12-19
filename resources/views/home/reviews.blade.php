<section>
    <div class="relative max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-20">
        @isset ($reviewedPartners[0])
            <div class="relative lg:flex lg:items-center">
                <div class="hidden lg:block lg:flex-shrink-0">
                    <img class="h-64 w-64 rounded-full xl:h-80 xl:w-80" src="{{ media($reviewedPartners[0]->reviewer_avatar) }}" alt="{{ $reviewedPartners[0]->reviewer_name }}" />
                </div>

                <div class="relative lg:ml-10">
                    <svg
                        class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-400 opacity-50"
                        stroke="currentColor" fill="none" viewBox="0 0 144 144"
                    >
                        <path stroke-width="2"
                              d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"
                        />
                    </svg>
                    <blockquote class="relative">
                        <div class="text-2xl leading-9 font-medium">
                            <p>
                                {{ $reviewedPartners[0]->review }}
                            </p>
                        </div>
                        <footer class="mt-8">
                            <div class="flex">
                                <div class="flex-shrink-0 lg:hidden">
                                    <img class="h-12 w-12 rounded-full" src="{{ media($reviewedPartners[0]->reviewer_avatar) }}" alt="{{ $reviewedPartners[0]->reviewer_name }}" />
                                </div>
                                <div class="ml-4 lg:ml-0">
                                    <div class="text-lg leading-6 font-medium">{{ $reviewedPartners[0]->reviewer_name }}</div>
                                    <div class="text-base leading-6 font-medium text-indigo-400">
                                        Member, {{ $reviewedPartners[0]->name }}
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endisset

        @isset($reviewedPartners[1])
            <div class="mt-32 relative lg:flex lg:items-center">
                <div class="relative lg:mr-10">
                    <svg
                        class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-400 opacity-50"
                        stroke="currentColor" fill="none" viewBox="0 0 144 144"
                    >
                        <path stroke-width="2"
                              d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"
                        />
                    </svg>
                    <blockquote class="relative">
                        <div class="text-2xl leading-9 font-medium">
                            <p>
                                {{ $reviewedPartners[1]->review }}
                            </p>
                        </div>
                        <footer class="mt-8">
                            <div class="flex">
                                <div class="flex-shrink-0 lg:hidden">
                                    <img class="h-12 w-12 rounded-full" src="{{ media($reviewedPartners[1]->reviewer_avatar) }}" alt="{{ $reviewedPartners[1]->reviewer_name }}" />
                                </div>
                                <div class="ml-4 lg:ml-0">
                                    <div class="text-lg leading-6 font-medium">{{ $reviewedPartners[1]->reviewer_name }}</div>
                                    <div class="text-base leading-6 font-medium text-indigo-400">
                                        Member, {{ $reviewedPartners[1]->name }}
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>

                <div class="hidden lg:block lg:flex-shrink-0">
                    <img class="h-64 w-64 rounded-full xl:h-80 xl:w-80"
                         src="{{ media($reviewedPartners[1]->reviewer_avatar) }}"
                         alt="{{ $reviewedPartners[1]->reviewer_name }}"
                    />
                </div>
            </div>
        @endisset

        @isset ($reviewedPartners[2])
            <div class="mt-32 relative lg:flex lg:items-center">
                <div class="hidden lg:block lg:flex-shrink-0">
                    <img class="h-64 w-64 rounded-full xl:h-80 xl:w-80" src="{{ media($reviewedPartners[2]->reviewer_avatar) }}" alt="{{ $reviewedPartners[2]->reviewer_name }}" />
                </div>

                <div class="relative lg:ml-10">
                    <svg
                        class="absolute top-0 left-0 transform -translate-x-8 -translate-y-24 h-36 w-36 text-indigo-400 opacity-50"
                        stroke="currentColor" fill="none" viewBox="0 0 144 144"
                    >
                        <path stroke-width="2"
                              d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z"
                        />
                    </svg>
                    <blockquote class="relative">
                        <div class="text-2xl leading-9 font-medium">
                            <p>
                                {{ $reviewedPartners[2]->review }}
                            </p>
                        </div>
                        <footer class="mt-8">
                            <div class="flex">
                                <div class="flex-shrink-0 lg:hidden">
                                    <img class="h-12 w-12 rounded-full" src="{{ media($reviewedPartners[2]->reviewer_avatar) }}" alt="{{ $reviewedPartners[2]->reviewer_name }}" />
                                </div>
                                <div class="ml-4 lg:ml-0">
                                    <div class="text-lg leading-6 font-medium">{{ $reviewedPartners[2]->reviewer_name }}</div>
                                    <div class="text-base leading-6 font-medium text-indigo-400">
                                        Member, {{ $reviewedPartners[2]->name }}
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        @endisset
    </div>
</section>
