<div>
    <x-card>
        <div class="w-full grid grid-cols-2 mb-10">
            <div>
                <h1>{{ __('Job Titles') }}</h1>
            </div>
            <div class="flex justify-end">
                <x-button href="{{ route('job-titles') }}" wire:navigate>{{ __('Back') }}</x-button>
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
