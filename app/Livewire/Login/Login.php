<?php

namespace App\Livewire\Login;

use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use LogoutTrait;
    use Interactions;

    #[Validate('required|email', onUpdate: false)]
    public string $email = '';

    #[Validate('required|min:6', onUpdate: false)]
    public string $password = '';

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.guest');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            $this->toast()->error('Credenciais inválidas');
        }
    }
}
