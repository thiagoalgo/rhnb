<div>
    <x-card>
        <div class="w-full grid grid-cols-2 mb-10">
            <div>
                <h1 class="text-lg font-semibold">{{ __('Job Titles') }}</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('job-titles-create') }}" wire:navigate>
                    {{ __('New') }}
                </x-button>
            </div>
        </div>
        @livewire('job-title.job-title-table')
    </x-card>
</div>
