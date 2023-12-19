<?php

namespace App\Livewire\JobTitle;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\JobTitleForm;
use App\Models\JobTitle;
use Livewire\Attributes\Url;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class JobTitleUpdate extends Component
{
    use Interactions;
    use AlertTrait;

    public JobTitleForm $form;

    #[Url(keep: true)]
    public $page = '';

    public function mount(JobTitle $jobTitle)
    {
        $this->form->setJobTitle($jobTitle);
    }

    public function save()
    {
        $this->form->update();
        $this->setFlash(self::SUCCESS, 'Cargo alterado com sucesso.');
        $this->redirectRoute('job-titles', ['page' => $this->page], navigate: true);
    }

    public function render()
    {
        return view('livewire.job-title.job-title-form');
    }
}
