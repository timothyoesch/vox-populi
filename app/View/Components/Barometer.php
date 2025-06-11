<?php

namespace App\View\Components;

use App\Models\Supporter;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Barometer extends Component
{
    public $supportersCount;
    public $signatureCount;
    public $target = 50000;
    public $percentage;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->supportersCount = Supporter::count();
        $this->signatureCount = 0;
        foreach (Supporter::all() as $supporter) {
            $this->signatureCount += $supporter->getCustomField('pledged_signatures') ?? 0;
        }
        $this->signatureCount = (int) $this->signatureCount;
        $this->percentage = min(100, round(($this->signatureCount / $this->target * 100) * 4, 0) / 4);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.barometer');
    }
}
