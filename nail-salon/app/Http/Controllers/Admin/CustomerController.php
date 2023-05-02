<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    function index()
    {
        $result = DB::table('customers')
            ->selectRaw('
                id,
                name,
                date_of_birth,
                phone_number,
                email,
                date_of_birth + INTERVAL (YEAR(CURRENT_DATE) - YEAR(date_of_birth))     YEAR AS currbirthday,
                date_of_birth + INTERVAL (YEAR(CURRENT_DATE) - YEAR(date_of_birth)) + 1 YEAR AS nextbirthday')
            ->orderByRaw('CASE
                    WHEN currbirthday >= CURRENT_DATE THEN currbirthday
                    ELSE nextbirthday
                END')->paginate();
        return view('admin.customer.index')->with('data', $result);
    }
    function save(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);
        $this->customValidate($data, $id);
        $obj = Customer::updateOrCreate(["id" => $id], $data);
        return redirect()->route("admin.customer.index");
    }
    function create()
    {
        return view('admin.customer.create');
    }
    function update($id)
    {
        $data = Customer::findOrFail($id);
        return view("admin.customer.update", compact("data"));
    }
    function delete($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return redirect()->route("admin.customer.index");
    }
    private function customValidate($data, $id = null)
    {
        $rules = [
            "name" => ['required'],
            "email" => ['required', 'email', 'unique:customers'],
            "phone_number" => ["required"],
            "date_of_birth" => ["required"]
        ];
        $fields = [
            'name' => 'Fullname',
            'email' => "Email",
            "phone_number" => "Phone number",
            "date_of_birth" => "Date of birth"
        ];
        if ($id != null) {
            // Bỏ qua check unique khi update
            $rules["email"] = ['required', 'email', Rule::unique('customers')->ignore($id)];
        }
        $validator = Validator::make($data, $rules, [], $fields);
        $validator->validate();
    }
}
