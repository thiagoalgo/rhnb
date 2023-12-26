<div>
    <x-card>
        <div class="w-full mb-5 flex justify-end">
            <x-button href="{{ route('job-titles-create') }}" wire:navigate text="{{ __('New') }}" />
        </div>

        @livewire('job-title.job-title-table')

    </x-card>
</div>
