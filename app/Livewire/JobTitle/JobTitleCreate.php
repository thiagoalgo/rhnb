<?php

namespace App\Livewire\JobTitle;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\JobTitleForm;
use Livewire\Attributes\Url;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class JobTitleCreate extends Component
{
    use Interactions;
    use AlertTrait;
    public JobTitleForm $form;

    #[Url(keep: true)]
    public $page = '';

    public function save()
    {
        $this->form->strore();
        $this->setFlash(self::SUCCESS, 'Cargo cadastrado com sucesso.');
        $this->redirectRoute('job-titles', ['page' => $this->page], navigate: true);
    }

    public function render()
    {
        return view('livewire.job-title.job-title-form');
    }
}
