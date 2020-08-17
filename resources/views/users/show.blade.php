@extends('layouts.app')

@section('title', $user->name.' | Users')

@section('content')
    {{--    <header class="py-10">--}}
    {{--        <div class="sm:flex items-center sm:space-x-8 space-y-4 sm:space-y-0 text-center sm:text-left">--}}
    {{--            <div class="flex-shrink-0">--}}
    {{--                <img src="{{ $user->avatar }}" onError="this.onerror = null; this.src = '/images/user.png';"--}}
    {{--                     class="h-32 w-32 rounded-full mx-auto sm:mx-0"--}}
    {{--                />--}}
    {{--            </div>--}}
    {{--            <div class="flex-grow flex-1 min-w-0">--}}
    {{--                <h2 class="text-2xl font-display leading-7 text-white sm:text-3xl sm:leading-9 sm:truncate">--}}
    {{--                    {{ $user->name }}--}}
    {{--                </h2>--}}
    {{--                @if (count($user->results))--}}
    {{--                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">--}}
    {{--                        <div class="mt-2 flex items-center mx-auto sm:mx-0 text-sm leading-5 text-gray-300 sm:mr-6">--}}
    {{--                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor"--}}
    {{--                                 viewBox="0 0 20 20"--}}
    {{--                            >--}}
    {{--                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>--}}
    {{--                                <path fill-rule="evenodd"--}}
    {{--                                      d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"--}}
    {{--                                      clip-rule="evenodd"--}}
    {{--                                ></path>--}}
    {{--                            </svg>--}}
    {{--                            Taken {{ count($user->results) }} {{ count($user->results) != 1 ? 'tests' : 'test' }}--}}
    {{--                        </div>--}}
    {{--                        <div class="mt-2 flex items-center mx-auto sm:mx-0 text-sm leading-5 text-gray-300 sm:mr-6">--}}
    {{--                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor"--}}
    {{--                                 viewBox="0 0 20 20"--}}
    {{--                            >--}}
    {{--                                <path fill-rule="evenodd"--}}
    {{--                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"--}}
    {{--                                      clip-rule="evenodd"--}}
    {{--                                ></path>--}}
    {{--                            </svg>--}}
    {{--                            Answered {{ count($user->responses) }} {{ count($user->responses) != 1 ? 'questions' : 'question' }}--}}
    {{--                        </div>--}}
    {{--                        <div class="mt-2 flex items-center mx-auto sm:mx-0 text-sm leading-5 text-gray-300 sm:mr-6">--}}
    {{--                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-500" fill="currentColor"--}}
    {{--                                 viewBox="0 0 20 20"--}}
    {{--                            >--}}
    {{--                                <path fill-rule="evenodd"--}}
    {{--                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"--}}
    {{--                                      clip-rule="evenodd"--}}
    {{--                                ></path>--}}
    {{--                            </svg>--}}
    {{--                            Last test--}}
    {{--                            taken {{ $user->results()->orderByDesc('created_at')->first()->updated_at->diffForHumans() }}--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </header>--}}

    {{--    <div class="lg:grid grid-cols-5 lg:space-x-5 space-y-5 lg:space-y-0">--}}
    {{--        <div class="col-span-3">--}}
    {{--            <div>--}}
    {{--                @include('users.show.results')--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--        <div class="col-span-2">--}}
    {{--            @include('users.show.other-users')--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
