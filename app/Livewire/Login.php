<?php

namespace App\Livewire;

use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    public function render()
    {
        return view('livewire.login')->layout('components.layouts.guest');
    }

    public function login(): void
    {
        dd($this->email . ' ' . $this->password);
    }
}
