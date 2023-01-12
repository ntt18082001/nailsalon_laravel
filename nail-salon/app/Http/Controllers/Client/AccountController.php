<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('client.home');
        }
        return view("client.account.login");
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('client.account.login');
    }
    function auth(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        $loginFail = redirect()
            ->back()
            ->with("login-err-msg", "Email không hợp lệ");
        if ($user == null) {
            return $loginFail;
        }
        $userData = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($userData)) {
            $request->session()->regenerate();
            return redirect("/");
        } else {
            return $loginFail;
        }
    }
    public function register()
    {
        if(Auth::check()) {
            return redirect()->route('client.home');
        }
        return view("client.account.register");
    }
    public function save(Request $request)
    {
        $data = $request->all();
        $rules = [
            "name" => ['required'],
            "username" => ['required', 'unique:users'],
            "email" => ['required', 'email', 'unique:users'],
            "phone_number" => ["required"],
            'password' => ['required', 'min:4'],
            'confirmPassword' => ['same:password'],
        ];
        $fields = [
            'name' => 'Họ và tên',
            'username' => "Tên tài khoản",
            'email' => "Email",
            "phone_number" => "Số điên thoại",
            'password' => "Mật khẩu",
            "confirmPassword" => "Xác nhận mật khẩu"
        ];
        unset($data["_token"]);
        $validator = Validator::make($data, $rules, [], $fields);

        // TODO: lỗi không hiển thị validate mesg
        $validator->validate();

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role_id = 3;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route("client.home");
    }
}
