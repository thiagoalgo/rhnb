<?php

namespace App\Livewire\PerformanceReview;

use App\Livewire\BaseComponent;

class PerformanceReview extends BaseComponent
{
    protected string $route = 'performance-review';

    public function render()
    {
        return view('livewire.performance-review.performance-review');
    }
}
