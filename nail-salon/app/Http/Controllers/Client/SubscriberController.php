<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function save(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);

        $sub = new Subscriber();
        $sub->email = $data['email'];
        $sub->save();
        
        return redirect()->route('client.home')->with('successMsg', "Subscribed!");
    }
}
