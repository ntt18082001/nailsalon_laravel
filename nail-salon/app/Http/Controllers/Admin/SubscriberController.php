<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    function index() {
        $data = Subscriber::orderByDesc('id')->paginate();
        return view('admin.subscriber.index')->with('data', $data);
    }
}
