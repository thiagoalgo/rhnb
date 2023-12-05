<?php

namespace App\Livewire\PerformanceReview;

use App\Livewire\BaseComponent;
use Livewire\Attributes\Title;

#[Title("Avaliação de Desempenho")]
class PerformanceReview extends BaseComponent
{
    protected string $route = 'performance-review';

    public function render()
    {
        return view('livewire.performance-review.performance-review');
    }
}
