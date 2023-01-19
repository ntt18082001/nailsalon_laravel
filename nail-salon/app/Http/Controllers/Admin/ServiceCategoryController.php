<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceCategoryController extends Controller
{
   function index()
   {
      $result = ServiceCategory::orderByDesc('id')->paginate();
      return view('admin.servicecategory.index')->with('data', $result);
   }
   function create()
   {
      return view('admin.servicecategory.create');
   }
   function save(Request $request, $id = null)
   {
      $data = $request->all();
      unset($data["_token"]);
      $this->customValidate($data, $id);

      $file = $request->file('cover_path');
      if ($file != null) {
         $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
         $file->storeAs("/public", $fileName);
         $data['cover_path'] = $fileName;
      }
      $obj = ServiceCategory::updateOrCreate(["id" => $id], $data);

      return redirect()->route("admin.servicecate.index");
   }
   function update($id)
   {
      $data = ServiceCategory::findOrFail($id);
      return view("admin.servicecategory.update", compact("data"));
   }
   function delete($id)
   {
      $data = ServiceCategory::findOrFail($id);
      $data->delete();
      return redirect()->route("admin.servicecate.index");
   }
   private function customValidate($data, $id = null)
   {
      $rules = [
         "name" => ["required"],
         "note" => ["required", "max:500"],
      ];

      $fields = [
         "name" => "Tên dịch vụ",
         "cover_path" => "Hình ảnh",
         "note" => "Ghi chú",
      ];

      if ($id == null) {
         $rules["cover_path"] = ["required"];
         $fields["cover_path"] = "Hình ảnh";
      }

      $validator = Validator::make($data, $rules, [], $fields);
      $validator->validate();
   }
}
