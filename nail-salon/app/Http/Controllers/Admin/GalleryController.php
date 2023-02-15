<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    function index() {
        $result = Gallery::orderByDesc('id')->paginate();
        return view('admin.gallery.index')->with('data', $result);
    }
    function create() {
        return view('admin.gallery.create');
    }
    function save(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data["_token"]);
        $this->customValidate($data, $id);
  
        $file = $request->file('img_path');
        if ($file != null) {
           $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
           $file->storeAs("/public/gallery", $fileName);
           $data['img_path'] = $fileName;
        }
        $obj = Gallery::updateOrCreate(["id" => $id], $data);
  
        return redirect()->route("admin.gallery.index");
    }
    function update($id)
    {
       $data = Gallery::findOrFail($id);
       return view("admin.gallery.update", compact("data"));
    }
    function delete($id)
    {
       $data = Gallery::findOrFail($id);
       $data->delete();
       return redirect()->route("admin.gallery.index");
    }
    private function customValidate($data, $id = null)
    {
      $rules = [];

      $fields = [];

      if ($id == null) {
         $rules["img_path"] = ["required"];
         $fields["img_path"] = "Image";
      }

      $validator = Validator::make($data, $rules, [], $fields);
      $validator->validate();
    }
}
