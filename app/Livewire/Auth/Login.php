<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\App\Alert\AlertTrait;
use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use LogoutTrait;
    use AlertTrait;
    use Interactions;

    public string $email = '';

    public string $password = '';


    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

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
        return view('livewire.auth.login')->layout('components.layouts.guest');
    }
}
