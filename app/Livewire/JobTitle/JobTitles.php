<?php

declare(strict_types=1);

namespace App\Livewire\JobTitle;

use Livewire\Component;

class JobTitles extends Component
{
    public string $title;

    public function mount(): void
    {
        $this->title = __('Job Titles');
    }

    public function render()
    {
        return view('livewire.job-title.job-titles')
            ->title($this->title);
    }
}
