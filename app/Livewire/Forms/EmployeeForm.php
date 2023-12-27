<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public ?Employee $employee;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required|min:3|max:255')]
    public string $email = '';

    #[Validate('max:20')]
    public ?string $registration = '';

    #[Validate('int|required')]
    public int $department_id;

    #[Validate('int|required')]
    public int $job_title_id;

    public function setEmployee(Employee $employee)
    {

        $this->employee = $employee;
        $this->name = $employee->user->name;
        $this->email = $employee->user->email;
        $this->registration = $employee->registration;
        $this->department_id = $employee->department_id;
        $this->job_title_id = $employee->job_title_id;
    }


    public function strore()
    {
        $this->validate();

        Employee::create($this->only(['name']));
    }

    public function update()
    {
        $this->validate();

        $this->employee->update(
            $this->all()
        );
    }

    public function delete()
    {
        $this->employee->user()->delete();
        $this->employee->delete();
    }
}
