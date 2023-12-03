<?php

namespace App\Livewire\TimeRecord;

use Livewire\Component;

class TimeRecord extends Component
{
    protected string $route = 'time-record';

    public function mount()
    {
        $this->dispatch('route-accessed', $this->route);
    }

    public function render()
    {
        return view('livewire.time-record.time-record');
    }
}
