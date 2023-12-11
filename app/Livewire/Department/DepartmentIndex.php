<?php

namespace App\Livewire\Department;

use Livewire\Attributes\Url;
use Livewire\Component;

class DepartmentIndex extends Component
{
    #[Url]
    public $page = '';
    public function render()
    {
        return view('livewire.department.department-index');
    }
}
