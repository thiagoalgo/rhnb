<?php

declare(strict_types=1);

namespace App\Livewire\Login;

use App\Livewire\App\Alert\AlertTrait;
use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Login extends Component
{
    use LogoutTrait;
    use AlertTrait;
    use Interactions;

    public string $email = '';

    public string $password = '';

    public string $emailReset = '';

    public bool $isVisibleModalForgotPassword = false;

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

    public function toggleModalForgotPassword(): void
    {
        $this->isVisibleModalForgotPassword = !$this->isVisibleModalForgotPassword;
        if ($this->isVisibleModalForgotPassword) {
            $this->js("setTimeout(() => {document.getElementById('emailReset').focus()}, 500)");
        }
    }

    public function sendResetEmail(): void
    {
        $this->validate([
            'emailReset' => 'required|email'
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->emailReset]
        );

        $this->setFlash(self::SUCCESS, __($status));

        $this->isVisibleModalForgotPassword = false;
    }

    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.guest');
    }
}
