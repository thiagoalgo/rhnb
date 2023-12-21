<?php

namespace App\Livewire\Login;

use App\Livewire\App\Alert\AlertTrait;
use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use LogoutTrait;
    use AlertTrait;
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
            $this->setFlash(self::DANGER, 'Credenciais inválidas');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.guest');
    }
}
