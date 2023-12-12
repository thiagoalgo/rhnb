<div>
    <x-card>
        <div class="w-full grid grid-cols-2 mb-10">
            <div>
                <h1>Setores</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('departments-create') }}?page={{ $page }}">Novo</x-button>
            </div>
        </div>
        @livewire('department.department-table')
    </x-card>
</div>
