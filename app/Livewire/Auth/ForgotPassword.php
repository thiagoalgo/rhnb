<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\App\Alert\AlertTrait;
use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ForgotPassword extends Component
{
    use LogoutTrait;
    use AlertTrait;
    use Interactions;

    public string $email = '';

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
    }

    public function sendResetEmail(): void
    {
        $this->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->setFlash(self::SUCCESS, __($status));
        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('components.layouts.guest');
    }
}
