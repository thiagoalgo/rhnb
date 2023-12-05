<?php

namespace App\Livewire\TimeRecord;

use App\Livewire\BaseComponent;
use Livewire\Attributes\Title;

#[Title("Registro de Ponto")]
class TimeRecord extends BaseComponent
{
    public string $route = 'time-record';

    public function render()
    {
        return view('livewire.time-record.time-record');
    }
}
