<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    protected string $route = 'home';

    public function mount()
    {
        $this->dispatch('route-accessed', $this->route);
    }

    public function render()
    {
        return view('livewire.home');
    }
}
