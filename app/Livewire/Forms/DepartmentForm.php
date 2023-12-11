<?php

namespace App\Livewire\Forms;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DepartmentForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $name = '';

    public function strore()
    {
        $this->validate();

        Department::create($this->all());
    }
}
