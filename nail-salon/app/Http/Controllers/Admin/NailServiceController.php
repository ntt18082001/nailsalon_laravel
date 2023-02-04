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
         "name" => "Name",
         "cover_path" => "Image",
         "description" => "Description",
         "duration" => "Time duration",
         "price_couleur" => "Price Couleur",
         "price_naturel" => "Price Naturel",
         "price_french" => "Price French",
         "service_cate_id" => "Service category"
      ];

      if ($id == null) {
         $rules["cover_path"] = ["required"];
         $fields["cover_path"] = "Image";
      }

      $validator = Validator::make($data, $rules, [], $fields);
      $validator->validate();
   }
}
