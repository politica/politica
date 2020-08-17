@section('title', 'Sign in')

<div class="text-center mx-auto px-4 sm:px-6 lg:px-8 sm:mt-20">
    <h3 class="font-display text-4xl">Sign in to Politica</h3>

    <h4 class="mt-3 text-lg text-gray-200 max-w-lg mx-auto">By signing in, you can access all of your test results
        from one
        place, track your beliefs, and much more.</h4>

    <div class="mt-6 space-y-3 sm:space-x-3 sm:space-y-0 text-center">
        <span class="rounded-md shadow-sm inline-flex">
            <button wire:click="redirectToProvider('discord')" type="button"
                    class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:outline-none focus:border-gray-600 focus:shadow-outline-gray active:bg-gray-700"
            >
                Sign in with Discord

                <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="m3.58 21.196h14.259l-.681-2.205 1.629 1.398 1.493 1.338 2.72 2.273v-21.525c-.068-1.338-1.22-2.475-2.648-2.475l-16.767.003c-1.427 0-2.585 1.139-2.585 2.477v16.24c0 1.411 1.156 2.476 2.58 2.476zm10.548-15.513-.033.012.012-.012zm-7.631 1.269c1.833-1.334 3.532-1.27 3.532-1.27l.137.135c-2.243.535-3.26 1.537-3.26 1.537s.272-.133.747-.336c3.021-1.188 6.32-1.102 9.374.402 0 0-1.019-.937-3.124-1.537l.186-.183c.291.001 1.831.055 3.479 1.26 0 0 1.844 3.15 1.844 7.02-.061-.074-1.144 1.666-3.931 1.726 0 0-.472-.534-.808-1 1.63-.468 2.24-1.404 2.24-1.404-.535.337-1.023.537-1.419.737-.609.268-1.219.4-1.828.535-2.884.468-4.503-.315-6.033-.936l-.523-.266s.609.936 2.174 1.404c-.411.469-.818 1.002-.818 1.002-2.786-.066-3.802-1.806-3.802-1.806 0-3.876 1.833-7.02 1.833-7.02z"
                          clip-rule="evenodd"
                    />
                    <path
                        d="m14.308 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.576-1.335-1.29-1.335v.003c-.708 0-1.288.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"
                    />
                    <path
                        d="m9.69 12.771c.711 0 1.29-.6 1.29-1.34 0-.735-.575-1.335-1.286-1.335l-.004.003c-.711 0-1.29.598-1.29 1.338 0 .734.579 1.334 1.29 1.334z"
                    />
                </svg>
            </button>
        </span>

        <br class="sm:hidden" />

        <span class="rounded-md shadow-sm inline-flex">
            <button wire:click="redirectToProvider('twitter')" type="button"
                    class="inline-flex items-center px-6 py-3 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-400 focus:outline-none focus:border-blue-600 focus:shadow-outline-blue active:bg-blue-600"
            >
                Sign in with Twitter

                <svg class="w-5 h-5 ml-3 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M19.9554745,3.91978102 C19.2212409,4.24540146 18.4321898,4.46547445 17.6040146,4.56445255 C18.4493431,4.05773723 19.0984672,3.25540146 19.4041606,2.29941606 C18.6131387,2.76854015 17.7369343,3.10927007 16.8043796,3.29291971 C16.0575182,2.49722628 14.9935036,2 13.8159854,2 C11.5548905,2 9.72175182,3.83306569 9.72175182,6.0940146 C9.72175182,6.41489051 9.7580292,6.72737226 9.82781022,7.0270073 C6.42518248,6.85627737 3.40846715,5.22635036 1.38919708,2.74941606 C1.03678832,3.35408759 0.834890511,4.05737226 0.834890511,4.80766423 C0.834890511,6.2280292 1.55773723,7.48116788 2.65627737,8.21532847 C1.98510949,8.19408759 1.35386861,8.00992701 0.801824818,7.70328467 C0.801532847,7.72036496 0.801532847,7.73751825 0.801532847,7.75474453 C0.801532847,9.73839416 2.21277372,11.3931387 4.08569343,11.7691971 C3.74211679,11.8627737 3.38043796,11.9127737 3.0070073,11.9127737 C2.74321168,11.9127737 2.48671533,11.8871533 2.23678832,11.8393431 C2.75773723,13.4659124 4.26970803,14.649562 6.06124088,14.6826277 C4.66007299,15.7806569 2.89474453,16.4351825 0.976642336,16.4351825 C0.64620438,16.4351825 0.320291971,16.4158394 0,16.3780292 C1.81182482,17.539635 3.96386861,18.2173723 6.27591241,18.2173723 C13.8064234,18.2173723 17.9243796,11.9789051 17.9243796,6.56875912 C17.9243796,6.39124088 17.920438,6.21467153 17.9125547,6.03912409 C18.7124088,5.46189781 19.4065693,4.74080292 19.9554745,3.91978102"
                          clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </span>
    </div>
</div>
