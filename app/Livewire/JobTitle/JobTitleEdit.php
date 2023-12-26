<?php

declare(strict_types=1);

namespace App\Livewire\JobTitle;

use App\Livewire\App\Alert\AlertTrait;
use App\Livewire\Forms\JobTitleForm;
use App\Models\JobTitle;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class JobTitleEdit extends Component
{
    use Interactions;
    use AlertTrait;

    public JobTitleForm $form;

    public function mount(JobTitle $jobTitle)
    {
        $this->title = __('Job Titles') . ' - ' . __('Edit');

        $this->form->setJobTitle($jobTitle);
    }

    public function save()
    {
        $this->authorize('manage-job-titles');

        $this->form->update();
        $this->setFlash(self::SUCCESS, __(':entity successfully saved.', ['entity' => __('Job Title')]));
        $this->redirectRoute('job-titles', navigate: true);
    }

    public function render()
    {
        return view('livewire.job-title.job-title-form')
            ->title($this->title);
    }
}
