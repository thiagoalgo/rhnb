<x-custom.card>

    <div class="w-full mb-5 flex justify-end">
        <x-button href="{{ route('departments-create') }}" wire:navigate text="{{ __('New') }}" />
    </div>

    @livewire('department.department-table')
</x-custom.card>
