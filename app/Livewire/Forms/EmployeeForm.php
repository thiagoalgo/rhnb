<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public ?Employee $employee;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('max:20')]
    public ?string $registration = '';

    #[Validate('string|required')]
    public string $role = '';

    #[Validate('int|required')]
    public int $department_id;

    #[Validate('int|required')]
    public int $job_title_id;

    #[Validate('required|min:3|max:255')]
    public string $email = '';

    #[Validate('required|confirmed|string|min:6|max:255')]
    public ?string $password = null;

    public ?string $password_confirmation = null;

    public bool $sendEmail = false;

    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
        $this->name = $employee->user->name;
        $this->email = $employee->user->email;
        $this->role = $employee->user->role;
        $this->registration = $employee->registration;
        $this->department_id = $employee->department_id;
        $this->job_title_id = $employee->job_title_id;
    }

    public function strore()
    {
        $this->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'registration' => ['max:20'],
            'role' => ['string', 'required'],
            'department_id' => ['int', 'required'],
            'job_title_id' => ['int', 'required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:6', 'max:255'],
        ]);

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt($this->password),
        ]);

        Employee::query()->create([
            'registration' => $this->registration,
            'user_id' => $user->id,
            'department_id' => $this->department_id,
            'job_title_id' => $this->job_title_id,
        ]);

        // TODO - Enviar email
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'registration' => ['max:20'],
            'role' => ['string', 'required'],
            'department_id' => ['int', 'required'],
            'job_title_id' => ['int', 'required'],
            'email' => ['required', 'email']
        ]);

        User::where(['id' => $this->employee->user->id])->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        Employee::where(['id' => $this->employee->id])->update([
            'registration' => $this->registration,
            'department_id' => $this->department_id,
            'job_title_id' => $this->job_title_id,
        ]);
    }

    public function delete()
    {
        $this->employee->user()->delete();
        $this->employee->delete();
    }
}
