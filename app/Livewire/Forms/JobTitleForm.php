<?php

namespace App\Livewire\Forms;

use App\Models\JobTitle;
use Livewire\Attributes\Validate;
use Livewire\Form;

class JobTitleForm extends Form
{
    public ?JobTitle $jobTitle;

    #[Validate('required|min:3|max:255')]
    public $name = '';

    public function setJobTitle(JobTitle $jobTitle)
    {
        $this->jobTitle = $jobTitle;
        $this->name = $jobTitle->name;
    }


    public function strore()
    {
        $this->validate();

        JobTitle::create($this->only(['name']));
    }

    public function update()
    {
        $this->validate();

        $this->jobTitle->update(
            $this->all()
        );
    }

    public function delete()
    {
        $this->jobTitle->delete();
    }
}
