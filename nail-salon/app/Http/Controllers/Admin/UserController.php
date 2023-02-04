<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $result = User::orderByDesc('id')->where('id', '!=', Auth::id())->paginate();
        return view('admin.user.index')->with('data', $result);
    }
    public function create()
    {
        return view("admin.user.create");
    }
    public function save(Request $request, $id = null)
    {
        $data = $request->all();
        $rules = [
            "name" => ['required'],
            "username" => ['required', 'unique:users'],
            "email" => ['required', 'email', 'unique:users'],
            "address" => ["required"],
            "role_id" => ["required"],
            "phone_number" => ["required"],
            'password' => ['required', 'min:4'],
            'confirmPassword' => ['same:password'],
        ];
        $fields = [
            'name' => 'Fullname',
            'username' => "Username",
            'email' => "Email",
            'address' => "Address",
            "role_id" => "Role",
            "phone_number" => "Phone number",
            'password' => "Password",
            "confirmPassword" => "Confirm password"
        ];
        if ($id != null){
            // Bỏ qua check unique khi update
            $rules["username"] = ['required', Rule::unique('users')->ignore($id)];
            $rules["email"] = ['required', 'email', Rule::unique('users')->ignore($id)];
            // bỏ qua check password khi update
            unset($rules['password']);
            unset($rules['confirmPassword']);
        }
        unset($data["_token"]);
        $validator = Validator::make($data, $rules, [], $fields);

        // TODO: lỗi không hiển thị validate mesg
        $validator->validate();

        if ($id == null){
            $user = new User();
        }else{
            $user = User::findOrFail($id);
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->role_id = $request->role_id;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        if ($id == null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route("admin.user.index");
    }
    function update($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit')->with('user', $user);
    }
    public function block($id)
    {
        $user = User::findOrFail($id);
        if ($user->is_blocked == true) {
            $user->is_blocked = false;
            $user->blocked_by = null;
        } else {
            $user->is_blocked = true;
            $user->blocked_by = Auth::id();
        }
        $user->save();
        return redirect()->route("index.user");
    }
}
