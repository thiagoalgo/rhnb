<?php

declare(strict_types=1);

namespace App\Livewire\Department;

use Livewire\Component;

class Departments extends Component
{
    public string $title;

    public function mount(): void
    {
        $this->title = __('Departments');
    }

    public function render()
    {
        return view('livewire.department.departments')
            ->title($this->title);
    }
}
