<?php

namespace App\Livewire\Department;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\DepartmentForm;
use App\Models\Department;
use Livewire\Attributes\Url;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class DepartmentUpdate extends Component
{
    use Interactions;
    use AlertTrait;

    public DepartmentForm $form;

    #[Url(keep: true)]
    public $page = '';

    public function mount(Department $department)
    {
        $this->form->setDepartment($department);
    }

    public function save()
    {
        $this->authorize('manage-departments');

        $this->form->update();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Department')]));
        $this->redirectRoute('departments', ['page' => $this->page], navigate: true);
    }

    public function render()
    {
        return view('livewire.department.department-form');
    }
}
