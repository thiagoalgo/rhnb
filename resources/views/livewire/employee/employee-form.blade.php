<x-custom.card>
    <form wire:submit="save">

        <x-custom.form-title text="{{ __('Personal Data') }}" />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">

            <div class="mb-4">
                <x-input id="name" wire:model="form.name" label="{{ __('Name') }}" />
            </div>

            <div class="mb-4">
                <x-input id="registration" wire:model="form.registration" label="{{ __('Registration') }}" />
            </div>

            <div></div>

            <div class="mb-4">
                <x-select.styled id="role" wire:model="form.role" label="{{ __('Role') }}" :options="$roles"
                    select="label:label|value:value" />
            </div>

            <div class="mb-4">
                <x-select.styled id="department_id" wire:model="form.department_id" label="{{ __('Department') }}"
                    :options="$departments" select="label:name|value:id" />
            </div>

            <div class="mb-4">
                <x-select.styled id="job_title_id" wire:model="form.job_title_id" label="{{ __('Job Title') }}"
                    :options="$jobTitles" select="label:name|value:id" />
            </div>

        </div>

        <x-custom.form-title text="{{ __('Access Data') }}" class="mt-4" />

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">

            <div class="mb-4">
                <x-input id="email" wire:model="form.email" label="{{ __('Email') }}" />
            </div>

            @if (!isset($form->employee))
                <div class="mb-4">
                    <x-password id="password" wire:model="form.password" label="{{ __('Password') }}" />
                </div>

                <div class="mb-4">
                    <x-password id="password_confirmation" wire:model="form.password_confirmation"
                        label="{{ __('Confirm Password') }}" />
                </div>
            @endif
        </div>

        @if (!isset($form->employee))
            <div class="grid grid-cols-1  gap-2 lg:gap-4 mt-4">

                <div class="mb-4">
                    <x-checkbox id="sendEmail" wire:model="form.sendEmail"
                        label="{{ __('Send email with the password to employee?') }}" />
                </div>

            </div>
        @endif

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
    <script>
        document.getElementById('name').focus();
    </script>
</x-custom.card>
