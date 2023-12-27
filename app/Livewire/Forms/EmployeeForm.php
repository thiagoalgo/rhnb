<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public ?Employee $department;

    #[Validate('required|min:3|max:255')]
    public $name = '';

    public function setEmployee(Employee $department)
    {
        $this->department = $department;
        $this->name = $department->name;
    }


    public function strore()
    {
        $this->validate();

        Employee::create($this->only(['name']));
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
        $this->department->user()->delete();
        $this->department->delete();
    }
}
