<?php

namespace App\Livewire\Department;

use Livewire\Attributes\Url;
use Livewire\Component;

class Departments extends Component
{
    #[Url]
    public $page = '';
    public function render()
    {
        return view('livewire.department.departments');
    }
}
