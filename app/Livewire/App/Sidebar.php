<?php

namespace App\Livewire\App;

use Livewire\Component;

class Sidebar extends Component
{

    public ?string $title;
    public function render()
    {
        return view('livewire.app.sidebar');
    }
}
