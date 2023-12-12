<?php

namespace App\Livewire\Forms;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DepartmentForm extends Form
{
    public ?Department $department;

    #[Validate('required|min:3|max:255')]
    public $name = '';

    public function setDepartment(Department $department)
    {
        $this->department = $department;
        $this->name = $department->name;
    }


    public function strore()
    {
        $this->validate();

        Department::create($this->only(['name']));
    }

    public function update()
    {
        $this->validate();

        $this->department->update(
            $this->all()
        );
    }

    public function delete()
    {
        $this->department->delete();
    }
}
