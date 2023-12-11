<?php

namespace App\Livewire\App\Alert;

trait AlertTrait
{

    const SUCCESS = 'success';
    const WARNING = 'warning';
    const DANGER = 'danger';
    const INFO = 'info';
    const DARK = 'dark';

    public function setFlash($type = self::SUCCESS, $message = null)
    {
        session()->flash($type, $message);
    }
}
