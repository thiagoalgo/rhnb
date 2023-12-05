<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email', onUpdate: true)]
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
            // Autenticação bem-sucedida
            return redirect()->route('home');
        } else {
            // Autenticação falhou
            session()->flash('error', 'Credenciais inválidas');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
