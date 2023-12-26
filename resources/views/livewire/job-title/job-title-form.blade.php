<div>
    <x-card>
        <form wire:submit="save">

            <div class="grid grid-cols-1 lg:grid-cols-3">

                <div class="mb-6">
                    <x-input id="name" wire:model="form.name" label="Nome" />
                </div>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-2 mt-6">
                <div>
                    <x-button text="{{ __('Save') }}" />
                </div>
                <div class="flex justify-end">
                    <x-button href="{{ route('job-titles') }}" wire:navigate text="{{ __('Back') }}" color="secondary"
                        outline />
                </div>
            </div>

        </form>
    </x-card>
    <script>
        document.getElementById('name').focus();
    </script>
</div>
