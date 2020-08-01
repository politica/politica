@if (count($otherTests))
    <div class="bg-gray-900 rounded-lg">
        <div class="flex items-center justify-between flex-wrap sm:flex-no-wrap p-6">
            <div>
                <h3 class="text-xl leading-6 font-medium">
                    Other
                    <span class="font-bold">{{ $test->category->name }}</span>
                    tests
                </h3>
            </div>
        </div>
        <div class="pb-2 px-2">
            @foreach($otherTests as $test)
                <a href="{{ route('tests.show', ['test' => $test]) }}"
                   class="flex items-center sm:space-x-5 hover:bg-gray-800 transition duration-200 ease-in-out rounded p-4"
                >
                    <div class="hidden sm:block flex-shrink-0 w-20 h-20 rounded-lg p-5 bg-{{ $test->color_left }}">
                        <img style="filter: invert()" src="/images/{{ $test->icon_left }}" />
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-bold text-lg">{{ $test->name }}</h4>
                        @if ($test->result)
                            <p>
                                <span class="font-bold"
                                >{{ ($test->result->value > 50 ? $test->result->value : 100 - $test->result->value).'%' }}</span>
                                <span>{{ $test->result->value > 50 ? $test->label_right : $test->label_left }}</span>
                            </p>
                        @else
                            <p>Take this test &rarr;</p>
                        @endif
                    </div>
                    <div class="hidden sm:block flex-shrink-0 w-20 h-20 rounded-lg p-5 bg-{{ $test->color_right }}">
                        <img style="filter: invert()" src="/images/{{ $test->icon_right }}" />
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endif
