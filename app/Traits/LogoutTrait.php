<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LogoutTrait
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
