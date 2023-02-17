<?php

namespace App\View\Components;

use App\Models\Slider;
use Illuminate\Support\Facades\Date;
use Illuminate\View\Component;

class SliderComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $now = now()->toDateString();
        $data = Slider::where('from', '=', null)->where('to', '=', null)
            ->orWhere('from', '!=', null)->where('to', '=', null)->whereDate('from', '<=', $now)
            ->orWhere('from', '=', null)->where('to', '!=', null)->whereDate('to', '>=', $now)
            ->orWhere('from', '!=', null)->where('to', '!=', null)->whereDate('from', '<=', $now)->whereDate('to', '>=', $now)->get();
        return view('components.slider-component')->with('data', $data);
    }
}
