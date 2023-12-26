<div>
    <x-card>
        <div class="grid grid-cols-2 mb-5">
            <div>
                <h1 class="text-lg font-semibold">{{ __('Departments') }}</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('departments') }}" wire:navigate>
                    {{ __('Back') }}
                </x-button>
            </div>
        </div>
        <hr>
        <form wire:submit="save">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                <div class="mt-6">
                    <x-input id="name" wire:model="form.name" label="Nome" />
                </div>

            </div>

            <div class="mt-6">
                <x-button text="{{ __('Save') }}" />
            </div>
        </form>
    </x-card>
    <script>
        document.getElementById('name').focus();
    </script>
</div>
