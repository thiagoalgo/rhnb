<div>
    <x-card>
        <div class="w-full grid grid-cols-2 mb-10">
            <div>
                <h1>{{ __('Departments') }}</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('departments-create') }}" wire:navigate>{{ __('New') }}</x-button>
            </div>
        </div>
        @livewire('department.department-table')
    </x-card>
</div>
