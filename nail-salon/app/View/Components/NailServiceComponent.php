<?php

namespace App\View\Components;

use App\Models\NailServices;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class NailServiceComponent extends Component
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
        $data = ServiceCategory::take(2)->get();
        $arrDataChild = [];
        foreach($data as $item) {
            $childs = NailServices::where('service_cate_id', '=', $item->id)->get();
            array_push($arrDataChild, $childs);
        }
        return view('components.nail-service-component')->with('data', $data)->with('data_childs', $arrDataChild);
    }
}
