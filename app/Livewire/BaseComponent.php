<?php

namespace App\Livewire;

use Livewire\Component;

class BaseComponent extends Component
{
    public function mount()
    {
        $this->dispatch('route-accessed', $this->route);
    }
}
