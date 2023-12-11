<?php

namespace App\Livewire\Department;

use App\Livewire\Forms\DepartmentForm;
use Livewire\Attributes\Url;
use Livewire\Component;

class DepartmentCreate extends Component
{
    public DepartmentForm $form;

    #[Url(keep: true)]
    public $page = '';

    public function render()
    {
        return view('livewire.department.department-create');
    }

    public function save()
    {
        $this->form->strore();
        $this->redirectRoute('department', ['page' => $this->page], navigate: true);
    }
}
