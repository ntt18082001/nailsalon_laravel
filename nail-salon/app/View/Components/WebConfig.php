<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class WebConfig extends Component
{
    public $displayData;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($displayData)
    {
        $this->displayData = $displayData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sql = "select id, name, value from web_configs where name='$this->displayData'";
        $data = DB::select($sql);
        return view('components.web-config')->with('data', $data[0]);
    }
}