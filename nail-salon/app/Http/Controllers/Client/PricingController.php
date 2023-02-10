<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\NailServices;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    function index() {
        $data = ServiceCategory::take(3)->get();
        $arrDataChild = [];
        foreach($data as $item) {
            $childs = NailServices::where('service_cate_id', '=', $item->id)->get();
            array_push($arrDataChild, $childs);
        }
        return view('client.pricing.index')->with('data', $data)->with('data_childs', $arrDataChild);
    }
    function detail($id) {
        $data = NailServices::findOrFail($id);
        return view('client.pricing.detail')->with('data', $data);
    }
}
