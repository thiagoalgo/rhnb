<?php

namespace App\Livewire\Department;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\DepartmentForm;
use Livewire\Attributes\Url;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class DepartmentCreate extends Component
{
    use Interactions;
    use AlertTrait;
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
        $this->setFlash(self::SUCCESS, 'Departamento cadastrado com sucesso.');
        $this->redirectRoute('department', ['page' => $this->page], navigate: true);
    }
}
