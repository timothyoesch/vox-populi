<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShareButtons extends Component
{
    public bool $end;
    /**
     * Create a new component instance.
     */
    public function __construct($end = false)
    {
        $this->end = $end;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.share-buttons');
    }
}
