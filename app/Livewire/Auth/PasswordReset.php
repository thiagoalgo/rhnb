<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Livewire\App\Alert\AlertTrait;
use App\Traits\LogoutTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class PasswordReset extends Component
{
    use LogoutTrait;
    use AlertTrait;
    use Interactions;

    #[Url]
    public string $token = '';

    #[Url]
    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';


    public function mount(): void
    {
        if (Auth::check()) {
            redirect()->route('home');
        }
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
        ]);

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));
            return;
        }

        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Password')]));
        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.password-reset')->layout('components.layouts.guest');
    }
}
