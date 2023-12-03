<?php

namespace App\Livewire\Sidebar;

use Livewire\Attributes\On;
use Livewire\Component;

class MenuItem extends Component
{

    public string $unique = '';
    public string $text = '';
    public ?string $icon = null;
    public bool $is_title = false;
    public bool $is_selected = false;
    public string $route = '';

    public function mount(): void
    {
        $this->unique = uniqid();
    }

    public function render()
    {
        return view('livewire.sidebar.menu-item');
    }


    public function onClick(string $unique): void
    {
        $this->is_selected = $this->unique === $unique;
        $this->dispatch('menu-item-clicked', unique: $unique);

        if ($this->route) {
            $this->redirectRoute($this->route, navigate: true);
        }
    }

    #[On('menu-item-clicked')]
    public function menuItemClicked(string $unique)
    {
        $this->is_selected = $this->unique === $unique;
    }
}
