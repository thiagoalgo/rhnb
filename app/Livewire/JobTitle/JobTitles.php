<?php

namespace App\Livewire\JobTitle;

use Livewire\Attributes\Url;
use Livewire\Component;

class JobTitles extends Component
{
    #[Url]
    public $page = '';
    public function render()
    {
        return view('livewire.job-title.job-titles');
    }
}
