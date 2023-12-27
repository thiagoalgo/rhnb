<x-custom.card>

    <div class="w-full mb-5 flex justify-end">
        <x-button href="{{ route('employees-create') }}" wire:navigate text="{{ __('New') }}" />
    </div>

    @livewire('employee.employee-table')
</x-custom.card>
