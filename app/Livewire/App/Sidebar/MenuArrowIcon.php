<?php

namespace App\Livewire\App\Sidebar;

use Livewire\Component;

class MenuArrowIcon extends Component
{
    public bool $is_closed = false;

    public function render()
    {
        return view('livewire.app.sidebar.menu-arrow-icon');
    }
}
