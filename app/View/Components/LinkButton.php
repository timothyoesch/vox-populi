<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkButton extends Component
{
    public $label;
    public $href;
    public $icon;

    /**
     * Create a new component instance.
     */
    public function __construct($label = "", $href = "", $icon = "right")
    {
        $this->label = $label;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link-button');
    }
}
