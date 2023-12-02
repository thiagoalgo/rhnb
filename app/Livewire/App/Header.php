<?php

namespace App\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.app.header');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
