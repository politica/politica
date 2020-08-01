@props(['result'])

<div class="flex">
    <div class="flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-t-lg rounded-bl-lg p-3 sm:p-4 md:p-5 bg-{{ $result->test->color_left }}">
        <img style="filter: invert()" src="/images/{{ $result->test->icon_left }}" />
    </div>
    <div class="flex items-end flex-grow">
        <div class="w-full">
            <div class="justify-between hidden px-2 md:px-3 py-1 font-medium sm:flex text-sm md:text-base">
                <div class="whitespace-no-wrap">{{ $result->test->label_left }}</div>
                <div class="whitespace-no-wrap">{{ $result->test->label_right }}</div>
            </div>
            <div class="flex h-8 md:h-10 text-xs sm:text-sm md:text-base">
                <div style="width: {{ 100 - $result->value }}%"
                     class="flex overflow-hidden @if (100 - $result->value > 24) px-1 sm:px-2 md:px-3 @endif items-center bg-{{ $result->test->color_left }} border-r-2 border-white"
                >
                    <div class="w-full text-left">@if (100 - $result->value > 24) {{ 100 - $result->value }}% @endif</div>
                </div>
                <div style="width: {{ $result->value }}%"
                     class="flex overflow-hidden @if ($result->value > 24) px-1 sm:px-2 md:px-3 @endif items-center bg-{{ $result->test->color_right }} border-l-2 border-white"
                >
                    <div class="w-full text-right">@if ($result->value > 24) {{ $result->value }}% @endif</div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-t-lg rounded-br-lg p-3 sm:p-4 md:p-5 bg-{{ $result->test->color_right }}">
        <img style="filter: invert()" src="/images/{{ $result->test->icon_right }}" />
    </div>
</div>

<div class="flex justify-between py-1 text-xs sm:hidden space-x-2">
    <p class="text-left">{{ $result->test->label_left }}</p>
    <p class="text-right">{{ $result->test->label_right }}</p>
</div>
