<?php

namespace App\Livewire\App\Sidebar;

use Livewire\Attributes\On;
use Livewire\Component;

class MenuItem extends Component
{
    public string $text = '';
    public ?string $icon = null;
    public bool $is_title = false;
    public bool $is_selected = false;
    public string $route = '';


    public function render()
    {
        return view('livewire.app.sidebar.menu-item');
    }


    public function onClick(): void
    {
        if ($this->route) {
            $this->redirectRoute($this->route, navigate: true);
        }
    }

    #[On('route-accessed')]
    public function menuItemClicked(string $route)
    {
        $this->is_selected = $this->route === $route;
    }
}
