<div class="flex justify-center">
    <div class="w-full max-w-screen-xl">
        <div class="flex flex-col gap-4">
            <div class="w-full">

                <x-custom.card class="w-full">
                    <x-custom.form-title text="{{ __('Employee') }}" />

                    <div class="mt-2">
                        <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 lg:grid-cols-6">
                                <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Name') }}</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $form->employee->user->name }}</dd>
                            </div>
                            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 lg:grid-cols-6">
                                <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Email') }}</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $form->employee->user->email }}</dd>
                            </div>
                            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 lg:grid-cols-6">
                                <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Registration') }}</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $form->employee->registration }}</dd>
                            </div>
                            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 lg:grid-cols-6">
                                <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Job Title') }}</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $form->employee->jobTitle->name }}</dd>
                            </div>
                            <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0 lg:grid-cols-6">
                                <dt class="text-sm font-medium leading-6 text-gray-900">{{ __('Department') }}</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $form->employee->department->name }}</dd>
                            </div>
                        </dl>
                    </div>
                </x-custom.card>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-full">

                <div class="w-full">

                    <x-custom.card>
                        <form wire:submit="save">
                            <x-custom.form-title text="{{ __('Edit') . ' ' . __('Profile Informations') }}" />

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

                </div>

                <div class="w-full">

                    <x-custom.card>
                        <form wire:submit="changePassword">
                            <x-custom.form-title text="{{ __('Change Password') }}" />

                            <div class="grid grid-cols-1 gap-2 lg:gap-4">

                                <div class="mb-4 lg:max-w-xs">
                                    <x-password id="password" wire:model="form.password"
                                        label="{{ __('New Password') }}" />
                                </div>

                                <div class="mb-4 lg:max-w-xs">
                                    <x-password id="password_confirmation" wire:model="form.password_confirmation"
                                        label="{{ __('Confirm Password') }}" />
                                </div>

                            </div>

                            <div class="mt-6">
                                <div>
                                    <x-button text="{{ __('Change Password') }}" />
                                </div>
                            </div>

                        </form>
                    </x-custom.card>

                </div>

            </div>

        </div>
    </div>
</div>
