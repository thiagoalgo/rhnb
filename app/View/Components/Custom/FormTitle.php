<?php

namespace App\View\Components\Custom;

use Illuminate\View\Component;
use Illuminate\View\View;

class FormTitle extends Component
{

    public function __construct(
        public string $text = '',
        public string $class = '',
    ) {
    }


    public function render(): View
    {
        return view('components.custom.form-title');
    }
}
