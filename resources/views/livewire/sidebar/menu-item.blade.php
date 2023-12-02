<li class="my-px">
    @if ($is_title)
        <span class="flex font-medium text-sm text-gray-300 px-4 my-4 uppercase">{{ $text }}</span>
    @else
        @if ($is_selected)
            <a href="#" class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-700 bg-gray-100">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <x-icon name="{{ $icon }}" class="h-6 w-6" outline="true" />
                </span>
                <span class="ml-3">{{ $text }}</span>

            </a>
        @else
            <a href="#" wire:click.prevent="onClick('{{ $unique }}')"
                class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-100 hover:text-gray-700">
                <span class="flex items-center justify-center text-lg text-gray-400">
                    <x-icon name="{{ $icon }}" class="h-6 w-6" outline="true" />
                </span>
                <span class="ml-3">{{ $text }}</span>
            </a>
        @endif
    @endif
</li>
