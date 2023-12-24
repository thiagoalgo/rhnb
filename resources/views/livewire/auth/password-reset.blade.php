<div>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(assets/img/cover7.jpg)"></div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <img src="assets/img/logo-rh-nb-bco.png" alt="" class="mx-auto">
                    </div>

                    <div class="mt-8">

                        <form wire:submit="resetPassword">

                            @livewire('app.alert.Alert')

                            {{ __('Update Password') }}

                            <div class="mt-6">
                                <x-input id="email" label="E-mail" icon="user" position="right"
                                    wire:model="email" class="py-3" />

                            </div>

                            <div class="mt-6">
                                <x-password autofocus id="password" label="{{ __('New Password') }}"
                                    wire:model="password" class="py-3" />
                            </div>

                            <div class="mt-6">
                                <x-password id="password_confirmation" label="{{ __('Confirm Password') }}"
                                    wire:model="password_confirmation" class="py-3" />
                            </div>

                            <div class="mt-6">
                                <x-button text="{{ __('Reset Password') }}" class="w-full bg-logorhnb" />
                            </div>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">
                            <a href="{{ route('login') }}"
                                class="text-blue-500 focus:outline-none focus:underline hover:underline">{{ __('Back') }}</a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
