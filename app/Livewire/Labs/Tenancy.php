<?php

namespace App\Livewire\Labs;

use Livewire\Component;

class Tenancy extends Component
{
    public function render()
    {
        // dd(tenant());
        return view('livewire.labs.tenancy')->layout('components.layouts.labs');;
    }

    public function onClick()
    {
        dd(tenant());
    }
}
