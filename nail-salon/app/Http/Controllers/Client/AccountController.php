<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use App\Models\WebConfigs;
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
        return redirect()->route('client.home');
    }
    function auth(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        $loginFail = redirect()
            ->back()
            ->with("login-err-msg", "Account is not valid");
        if ($user == null) {
            return $loginFail;
        }
        $userData = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($userData)) {
            $request->session()->regenerate();
            if($user->role_id == 1) {
                return redirect()->route('admin.ticket.index');
            }
            return redirect()->route('client.booking.index');
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
            'name' => 'Fullname',
            'username' => "Username",
            'email' => "Email",
            "phone_number" => "Phone number",
            'password' => "Password",
            "confirmPassword" => "Confirm password"
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
        return redirect()->route("client.account.login");
    }

    function profile() {
        if(Auth::check()) {
            $user = Auth::user();
            $bookingHistory = Ticket::where('cus_id', '=', $user->id)->orderByDesc('id')->paginate();
            $conf = WebConfigs::where('name', '=', 'time_cancel')->get();
            return view('client.account.profile')->with('user', $user)->with('data', $bookingHistory)->with('time_cancel', $conf[0]->value);
        }
        return redirect()->route('client.account.login');
    }
    function changepassword() {
        return view('client.account.changepassword');
    }
    function saveChangePassword(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        // validate data
        $rules = [
            "password" => ["required"],
            "newPassword" => ["required"],
            "confirmPassword" => ["same:newPassword"],
        ];

        $fields = [
            "password" => "Old password",
            "newPassword" => "New password",
            "confirmPassword" => "Confirm new password",
        ];

        $validator = Validator::make($request->all(), $rules, [], $fields);
        $validator->validate();

        if (Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect()
                ->back()
                ->with("change-success", "Change password successfully!");
        } else {
            return redirect()
                ->back()
                ->with("change-err", "Incorect old password!");
        }
    }
}
