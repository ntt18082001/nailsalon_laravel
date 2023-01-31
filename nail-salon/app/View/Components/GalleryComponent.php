<?php

namespace App\View\Components;

use App\Models\NailServices;
use Illuminate\View\Component;

class GalleryComponent extends Component
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
        $data = NailServices::select('id', 'cover_path', 'name')->take(8)->get();
        return view('components.gallery-component')->with('data', $data);
    }
}
