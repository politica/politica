<div id="tests" class="pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        @foreach ($categories as $category => $tests)
            <div class="text-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold sm:text-4xl sm:leading-10">
                    {{ $tests->first()->category->name }} Tests
                </h2>
            </div>
            <div class="mt-8 grid gap-4 lg:gap-10 max-w-lg mx-auto lg:grid-cols-2 lg:max-w-none">
                @foreach ($tests as $test)
                    <a href="{{ route('tests.show', ['test' => $test]) }}"
                       class="flex items-center sm:space-x-5 bg-gray-800 hover:bg-gray-900 transform hover:-translate-y-2 focus:-translate-y-2 transition duration-150 ease-in-out rounded p-4"
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
        @endforeach
    </div>
</div>
