<?php

namespace App\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.guest');
    }

    public function login()
    {
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
}
