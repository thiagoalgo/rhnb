<?php

declare(strict_types=1);

namespace App\Livewire\Department;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\DepartmentForm;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class DepartmentCreate extends Component
{
    use Interactions;
    use AlertTrait;
    public DepartmentForm $form;

    private string $title;

    public function mount(): void
    {
        $this->title = __('Departments') . ' - ' . __('Create');
    }

    public function save()
    {
        $this->authorize('manage-departments');

        $this->form->strore();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Department')]));
        $this->redirectRoute('departments', ['page' => $this->page], navigate: true);
    }

    public function render()
    {
        return view('livewire.department.department-form')
            ->title($this->title);
    }
}
