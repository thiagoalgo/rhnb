<?php

namespace App\Livewire\App;

use App\Traits\LogoutTrait;
use Livewire\Component;

class Header extends Component
{
    use LogoutTrait;

    public ?string $title;

    public function render()
    {
        return view('livewire.app.header');
    }
}
