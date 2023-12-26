<?php

declare(strict_types=1);

namespace App\Livewire\Department;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\DepartmentForm;
use App\Models\Department;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class DepartmentUpdate extends Component
{
    use Interactions;
    use AlertTrait;

    public DepartmentForm $form;

    private string $title;

    public function mount(Department $department)
    {
        $this->title = __('Departments') . ' - ' . __('Edit');
        $this->form->setDepartment($department);
    }

    public function save()
    {
        $this->authorize('manage-departments');

        $this->form->update();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Department')]));
        $this->redirectRoute('departments', navigate: true);
    }

    public function render()
    {
        return view('livewire.department.department-form')
            ->title($this->title);
    }
}
