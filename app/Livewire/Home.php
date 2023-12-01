<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public string $name = 'Thiago';

    public function render()
    {
        return view('livewire.home');
    }
}
