@if (count($communityResults))
    <div class="bg-gray-900 rounded-lg">
        <div class="p-6">
            <h3 class="text-xl leading-6 font-medium">
                Results from the community
            </h3>
        </div>
        <div class="pb-2 px-2">
            @foreach($communityResults as $result)
                <a href="{{ route('users.show', ['user' => $result->user]) }}"
                   class="flex items-center space-x-4 xl:space-x-8 hover:bg-gray-800 transition duration-200 ease-in-out rounded p-4"
                >
                    <div class="flex-shrink-0">
                        <img src="{{ $result->user->avatar }}" onError="this.onerror = null; this.src = '/images/user.png';"
                             class="w-12 h-12 md:w-16 md:h-16 rounded-full"
                        />
                    </div>
                    <div class="flex-grow md:flex">
                        <div class="flex-grow">
                            <h4 class="font-bold text-lg">{{ $result->user->name }}</h4>
                            <p>
                                <span class="font-bold"
                                >{{ ($result->value > 50 ? $result->value : 100 - $result->value).'%' }}</span>
                                <span>{{ $result->value > 50 ? $test->label_right : $test->label_left }}</span>
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <p class="text-sm">{{ $result->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
