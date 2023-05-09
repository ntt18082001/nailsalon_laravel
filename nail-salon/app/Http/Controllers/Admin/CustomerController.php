<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\WebConfigs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    function index()
    {
        return view('admin.customer.index');
    }
    public function getListCusBirthday()
    {
        $today = Carbon::today();
        $nextMonth = Carbon::today()->addMonth();
        $customers = Customer::whereRaw('MONTH(date_of_birth) BETWEEN ? AND ?', [$today->month, $nextMonth->month])
            ->select('date_of_birth')
            ->get()
            ->map(function ($customer) {
                return $customer->date_of_birth->format('Y-m-d');
            });
        return response()->json([
            'customers' => $customers,
        ]);
    }
    public function getCustomersByBirthday($date)
    {
        $selectedDate = Carbon::parse($date);
        $customers = Customer::select('name', 'date_of_birth', 'phone_number')
            ->whereDay('date_of_birth', '=', $selectedDate->day)
            ->whereMonth('date_of_birth', '=', $selectedDate->month)
            ->get();
        $sms_config = WebConfigs::where('name', 'sms_content')->get();
        return response()->json(['customers' => $customers, 'sms_content' => $sms_config[0]->value]);
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
