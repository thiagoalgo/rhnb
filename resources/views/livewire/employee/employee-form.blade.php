<div>
    <x-card>
        <form wire:submit="save">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                <div class="mb-6">
                    <x-input id="name" wire:model="form.name" label="{{ __('Name') }}" />
                </div>
                <div class="mb-6">
                    <x-input id="email" wire:model="form.email" label="{{ __('Email') }}" />
                </div>
                <div class="mb-6">
                    <x-input id="registration" wire:model="form.registration" label="{{ __('Registration') }}" />
                </div>

                <div class="mb-6">
                    <x-select.styled id="department_id" wire:model="form.department_id" label="{{ __('Department') }}"
                        :options="$departments" select="label:name|value:id" />
                </div>

                <div class="mb-6">
                    <x-select.styled id="job_title_id" wire:model="form.job_title_id" label="{{ __('Job Title') }}"
                        :options="$jobTitles" select="label:name|value:id" />
                </div>

            </div>

            <div class="grid grid-cols-2 lg:grid-cols-2 mt-6">
                <div>
                    <x-button text="{{ __('Save') }}" />
                </div>
                <div class="flex justify-end">
                    <x-button href="{{ route('employees') }}" wire:navigate text="{{ __('Back') }}" color="secondary"
                        outline />
                </div>
            </div>
        </form>
    </x-card>
    <script>
        document.getElementById('name').focus();
    </script>
</div>
