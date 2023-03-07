<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebConfigs;
use Illuminate\Http\Request;

class WebConfigController extends Controller
{
    function index()
    {
        $data = WebConfigs::where('name', '!=', 'about')
            ->where('name', '!=', 'about_img')
            ->where('name', '!=', 'mail_reciver')->get();
        return view('admin.webconfig.index')->with('data', $data);
    }
    function about()
    {
        $data = WebConfigs::where('name', '=', 'about')->get();
        $data_img = WebConfigs::where('name', '=', 'about_img')->get();
        return view('admin.webconfig.about')->with('data', $data[0])->with('data_img', $data_img[0]);
    }
    function save(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);

        $file = $request->file('logo');
        if ($file != null) {
            $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
            $file->storeAs("/public/webconfig", $fileName);
            $data['logo'] = $fileName;
        }
        foreach ($data as $key => $value) {
            WebConfigs::where('name', '=', $key)->update([
                'value' => $value ?? ''
            ]);
        }
        return redirect()->route('admin.config.index');
    }
    function saveAbout(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);

        $file = $request->file('about_img');
        if ($file != null) {
            $fileName = $file->hashName(); //tạo tên file ngẩu nhiên
            $file->storeAs("/public/webconfig", $fileName);
            $data['about_img'] = $fileName;
        }

        foreach ($data as $key => $value) {
            WebConfigs::where('name', '=', $key)->update([
                'value' => $value ?? ''
            ]);
        }

        return redirect()->route('admin.about.index');
    }
}
