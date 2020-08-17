@props(['result'])

<div class="flex items-center">
    <div
        class="flex flex-col flex-shrink-0 overflow-hidden bg-white border-2 border-white rounded-lg h-14 w-14 sm:h-20 sm:w-20"
    >
        <div class="bg-{{ $result->axis->color_left }} flex-grow flex items-center px-3 sm:px-4">
            <img src="/images/axis-icons/{{ $result->axis->icon_left }}"
                 class="w-full"
            />
        </div>
        <p class="w-full leading-tight text-center text-gray-900 text-xxs sm:text-xs">{{ $result->axis->label_left }}</p>
    </div>

    <div class="flex-grow">
        <p class="-mt-4 text-xs text-center sm:text-base">
            <span class="@if ($result->label) hidden sm:inline @endif font-bold"
            >{{ $result->axis->name.($result->label ? ':' : '') }}</span>
            <span>{{ $result->label }}</span>
        </p>

        <div class="flex h-10 mt-1 border-t-2 border-b-2 border-white sm:h-12">
            <div
                class="flex items-center h-full @if (100 - $result->value >= 30) px-2 @endif bg-{{ $result->axis->color_left }} border-r border-white"
                style="width: {{ 100 - $result->value }}%"
            >
                @if (100 - $result->value >= 30)
                    <p>{{ 100 - $result->value }}%</p> @endif
            </div>

            <div
                class="flex items-center justify-end h-full @if ($result->value >= 30) px-2 @endif bg-{{ $result->axis->color_right }} border-l border-white"
                style="width: {{ $result->value }}%"
            >
                @if ($result->value >= 30)
                    <p>{{ $result->value }}%</p> @endif
            </div>
        </div>
    </div>

    <div
        class="flex flex-col flex-shrink-0 overflow-hidden bg-white border-2 border-white rounded-lg h-14 w-14 sm:h-20 sm:w-20"
    >
        <div class="bg-{{ $result->axis->color_right }} flex-grow flex items-center px-3 sm:px-4">
            <img src="/images/axis-icons/{{ $result->axis->icon_right }}"
                 class="w-full"
            />
        </div>
        <p class="w-full leading-tight text-center text-gray-900 bg-white text-xxs sm:text-xs">{{ $result->axis->label_right }}</p>
    </div>
</div>
