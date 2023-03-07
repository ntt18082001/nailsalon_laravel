<?php

namespace App\View\Components;

use App\Models\NailServices;
use App\Models\ServiceCategory;
use Illuminate\View\Component;

class ListCheckboxService extends Component
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
        $data = ServiceCategory::with('list_nail_services')->get();
        return view('components.list-checkbox-service')->with('data', $data);
    }
}
