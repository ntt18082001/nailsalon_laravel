<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    function index() {
        $result = Slider::orderByDesc('id')->paginate();
        return view('admin.slider.index')->with('data', $result);
    }
    function create() {
        return view('admin.slider.create');
    }
    function save(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);
        $this->customValidate($data, $id);
  
        $file = $request->file('img_path');
        if ($file != null) {
           $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
           $file->storeAs("/public/slider", $fileName);
           $data['img_path'] = $fileName;
        }
        $obj = Slider::updateOrCreate(["id" => $id], $data);
  
        return redirect()->route("admin.slider.index");
    }
    function update($id)
    {
       $data = Slider::findOrFail($id);
       return view("admin.slider.update", compact("data"));
    }
    function delete($id)
    {
       $data = Slider::findOrFail($id);
       $data->delete();
       return redirect()->route("admin.slider.index");
    }
    private function customValidate($data, $id = null)
    {
      $rules = [
         "to" => ["after:from", "nullable"],
      ];

      $fields = [
         "from" => "From date",
         "to" => "To date",
      ];

      if ($id == null) {
         $rules["img_path"] = ["required"];
         $fields["img_path"] = "Image";
      }

      $validator = Validator::make($data, $rules, [], $fields);
      $validator->validate();
    }
}
