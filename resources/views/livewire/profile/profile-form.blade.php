<div class="flex justify-center">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-full max-w-screen-xl">

        <x-custom.card class="w-full">
            <form wire:submit="save">
                <x-custom.form-title text="{{ __('Profile Informations') }}" />

                <div class="grid grid-cols-1 gap-2 lg:gap-4">

                    <div class="mb-4 lg:max-w-xs">
                        <x-input id="name" wire:model="form.name" label="{{ __('Name') }}" />
                    </div>

                    <div class="mb-4 lg:max-w-xs"">
                        <x-input id="email" wire:model="form.email" label="{{ __('Email') }}" />
                    </div>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-2 mt-6">
                    <div>
                        <x-button text="{{ __('Save') }}" />
                    </div>
                </div>

            </form>
        </x-custom.card>

        <x-custom.card class="flex">
            <form wire:submit="changePassword">
                <x-custom.form-title text="{{ __('Change Password') }}" />

                <div class="grid grid-cols-1 gap-2 lg:gap-4">

                    <div class="mb-4 lg:max-w-xs">
                        <x-password id="password" wire:model="form.password" label="{{ __('New Password') }}" />
                    </div>

                    <div class="mb-4 lg:max-w-xs">
                        <x-password id="password_confirmation" wire:model="form.password_confirmation"
                            label="{{ __('Confirm Password') }}" />
                    </div>

                </div>

                <div class="grid grid-cols-2 lg:grid-cols-2 mt-6">
                    <div>
                        <x-button text="{{ __('Change Password') }}" />
                    </div>
                </div>

            </form>
        </x-custom.card>

    </div>
</div>
