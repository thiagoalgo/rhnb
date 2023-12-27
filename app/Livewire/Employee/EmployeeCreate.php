<?php

declare(strict_types=1);

namespace App\Livewire\Employee;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\EmployeeForm;
use App\Models\Department;
use App\Models\JobTitle;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class EmployeeCreate extends Component
{
    use Interactions;
    use AlertTrait;

    public array $departments;

    public array $jobTitles;

    public EmployeeForm $form;

    private string $title;

    public function mount(): void
    {
        $this->title = __('Employees') . ' - ' . __('Create');

        $this->departments = Department::all()->toArray();
        $this->jobTitles = JobTitle::all()->toArray();
    }

    public function save()
    {
        $this->authorize('manage-employees');

        $this->form->strore();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Employee')]));
        $this->redirectRoute('employees', navigate: true);
    }

    public function render()
    {
        return view('livewire.employee.employee-form')
            ->title($this->title);
    }
}
