<?php

namespace App\Livewire\PerformanceReview;

use Livewire\Component;

class PerformanceReview extends Component
{
    protected string $route = 'performance-review';

    public function mount()
    {
        $this->dispatch('route-accessed', $this->route);
    }

    public function render()
    {
        return view('livewire.performance-review.performance-review');
    }
}
