<div>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(assets/img/cover7.jpg)">

            </div>

            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <img src="assets/img/logo-rh-nb-bco.png" alt="" class="mx-auto">
                        <p class="mt-3 text-gray-500 dark:text-gray-300">Faça login para acessar a sua conta</p>
                    </div>

                    <div class="mt-8">
                        <form wire:submit="login">
                            <div class="mt-6">
                                <x-input id="email" label="E-mail" icon="user" position="right"
                                    wire:model="email" class="py-3" />
                                <script>
                                    document.getElementById('email').focus();
                                </script>
                            </div>
                            <div class="mt-6">
                                <x-password label="Senha:" wire:model="password" class="px-2 py-3" />
                            </div>
                            <div class="mt-6">
                                <x-button text="Entrar" class="w-full bg-logorhnb" />
                            </div>
                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Esqueceu a senha? <a href="#"
                                class="text-blue-500 focus:outline-none focus:underline hover:underline">Clique
                                aqui</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
