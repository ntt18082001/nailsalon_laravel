<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index() {
        if(Auth::check()) {
            $user = Auth::user();
            if($user->role_id == 1 || $user->role_id == 2) {
                return redirect()->route('admin.user.index');
            }
            if($user->role_id == 3) {
                return redirect("/");
            }
        } else {
            return redirect()->route("admin.account.login");
        }
    }
}
