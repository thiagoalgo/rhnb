<?php

declare(strict_types=1);

namespace App\Livewire\Employee;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\EmployeeForm;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobTitle;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EmployeeEdit extends Component
{
    use Interactions;
    use AlertTrait;

    public array $roles;

    public array $departments;

    public array $jobTitles;

    public EmployeeForm $form;

    public string $title;

    public function mount(Employee $employee)
    {
        $this->title = __('Employees') . ' - ' . __('Edit');
        $this->form->setEmployee($employee);

        $this->departments = Department::all()->toArray();
        $this->jobTitles = JobTitle::all()->toArray();
        $this->roles = roleToSelect();
    }

    public function save()
    {
        $this->authorize('manage-employees');

        $this->form->update();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Employee')]));
        $this->redirectRoute('employees', navigate: true);
    }

    public function render()
    {
        return view('livewire.employee.employee-form')
            ->title($this->title);
    }
}
