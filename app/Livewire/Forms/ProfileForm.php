<?php

namespace App\Livewire\Forms;

use App\Models\Employee;
use App\Models\User;
use Livewire\Form;

class ProfileForm extends Form
{
    public Employee $employee;
    public string $name;
    public string $email;
    public string $password;
    public string $password_confirmation;

    public function setEmployee(Employee $employee): void
    {
        $this->employee = $employee;
        $this->name = $this->employee->user->name;
        $this->email = $this->employee->user->email;
    }

    public function save(): void
    {
        $this->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email']
        ]);

        User::where(['id' => $this->employee->user->id])->update([
            'name' => $this->name,
            'email' => $this->email
        ]);
    }

    public function changePassword(): void
    {
        $this->validate([
            'password' => ['required', 'confirmed', 'min:6', 'max:255'],
        ]);

        User::where(['id' => $this->employee->user->id])->update([
            'password' => bcrypt($this->password),
        ]);
    }
}
