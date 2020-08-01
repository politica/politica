@if (count($otherUsers))
    <div class="bg-gray-900 rounded-lg">
        <div class="p-6">
            <h3 class="text-xl leading-6 font-bold">
                Other users
            </h3>
        </div>
        <div class="pb-2 px-2">
            @foreach($otherUsers as $user)
                <a href="{{ route('users.show', ['user' => $user]) }}"
                   class="flex items-center space-x-4 sm:space-x-8 hover:bg-gray-800 transition duration-200 ease-in-out rounded p-4"
                >
                    <div class="flex-shrink-0">
                        <img src="{{ $user->avatar }}" onError="this.onerror = null; this.src = '/images/user.png';"
                             class="w-12 h-12 md:w-16 md:h-16 rounded-full"
                        />
                    </div>
                    <div class="flex-grow md:flex">
                        <div class="flex-grow">
                            <h4 class="font-bold text-lg">{{ $user->name }}</h4>
                            <p>
                                <span>Taken</span> <span class="font-bold">{{ count($user->results) }} {{ count($user->results) != 1 ? 'tests' : 'test' }}</span>
                            </p>
                            <p>
                                <span>Answered</span> <span class="font-bold">{{ count($user->responses) }} {{ count($user->responses) != 1 ? 'questions' : 'question' }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
