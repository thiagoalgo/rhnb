<?php

namespace App\Livewire;

use App\Livewire\BaseComponent;

class Home extends BaseComponent
{
    public string $route = 'home';

    public function render()
    {
        return view('livewire.home');
    }
}
