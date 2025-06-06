<?php

namespace App\View\Components;

use App\Models\Supporter;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Barometer extends Component
{
    public $count;
    public $target;
    public $percentage;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->count = Supporter::all()->count();
        switch ($this->count) {
            case $this->count <= 250:
                $this->count = 161;
                $this->target = 3500;
                break;
            case $this->count > 4000 && $this->count <= 6000:
                $this->target = 7500;
                break;
            case $this->count > 6000 && $this->count <= 8000:
                $this->target = 10000;
                break;
            case $this->count > 8000 && $this->count <= 12000:
                $this->target = 15000;
                break;
            case $this->count > 14000 && $this->count <= 18000:
                $this->target = 20000;
                break;
            case $this->count > 18000:
                $this->target = 25000;
                break;
            default:
                $this->target = 5000;
                break;
        }
        $this->percentage = min(100, round(($this->count / $this->target * 100) * 4, 0) / 4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barometer');
    }
}
