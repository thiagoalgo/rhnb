<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Home extends Component
{
    public string $route = 'home';

    public function render()
    {
        return view('livewire.home.home');
    }
}
