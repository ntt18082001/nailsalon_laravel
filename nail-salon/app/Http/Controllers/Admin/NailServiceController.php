<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NailServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NailServiceController extends Controller
{
   function index()
   {
      $result = NailServices::orderByDesc('id')->paginate();
      return view('admin.nailservice.index')->with('data', $result);
   }
   function create()
   {
      return view('admin.nailservice.create');
   }
   function save(Request $request, $id = null)
   {
      $data = $request->all();
      unset($data["_token"]);
      $this->customValidate($data, $id);
      
      $file = $request->file('cover_path');
      if ($file != null) {
         $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
         $file->storeAs("/public/nailservice", $fileName);
         $data['cover_path'] = $fileName;
      }
      $obj = NailServices::updateOrCreate(["id" => $id], $data);

      return redirect()->route("admin.nailservice.index");
   }
   function update($id)
   {
      $data = NailServices::findOrFail($id);
      return view("admin.nailservice.update", compact("data"));
   }
   function delete($id)
   {
      $data = NailServices::findOrFail($id);
      $data->delete();
      return redirect()->route("admin.nailservice.index");
   }
   private function customValidate($data, $id = null)
   {
      $rules = [
         "name" => ["required"],
         "description" => ["required", "max:500"],
         "duration" => ["required", "numeric"],
         "price_couleur" => ["required", "numeric"],
         "service_cate_id" => ["required"]
      ];

      $fields = [
         "name" => "Tên dịch vụ",
         "cover_path" => "Hình ảnh",
         "description" => "Mô tả",
         "duration" => "Thời gian",
         "price_couleur" => "Giá Couleur",
         "price_naturel" => "Giá Naturel",
         "price_french" => "Giá French",
         "service_cate_id" => "Loại dịch vụ"
      ];

      if ($id == null) {
         $rules["cover_path"] = ["required"];
         $fields["cover_path"] = "Hình ảnh";
      }

      $validator = Validator::make($data, $rules, [], $fields);
      $validator->validate();
   }
}
