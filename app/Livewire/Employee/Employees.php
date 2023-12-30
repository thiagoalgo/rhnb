<?php

declare(strict_types=1);

namespace App\Livewire\Employee;

use Livewire\Component;

class Employees extends Component
{
    public string $title;

    public function mount(): void
    {
        $this->title = __('Employees');
    }

    public function render()
    {
        return view('livewire.employee.employees')
            ->title($this->title);
    }
}
