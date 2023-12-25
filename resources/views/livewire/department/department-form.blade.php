<div>
    <x-card>
        <div class="w-full grid grid-cols-2 mb-10">
            <div>
                <h1>{{ __('Departments') }}</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('departments') }}" wire:navigate>{{ __('Back') }}</x-button>
            </div>
        </div>

        <form wire:submit="save" class="w-1/4">
            <div class="mt-6">
                <div class="mt-6">
                    <x-input id="name" wire:model="form.name" label="Nome" />
                </div>
                <script>
                    document.getElementById('name').focus();
                </script>
                <div class="mt-6">
                    <x-button text="{{ __('Save') }}" />
                </div>
            </div>
        </form>
    </x-card>
</div>
