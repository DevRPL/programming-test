<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Entities\Setting;
use Auth;

class SettingController extends Controller
{
    public function __construct()
    {
        //    
    }

    public function index()
    {
        site_permission('settings-display', 403);

        $setting = Setting::first();
        
        return view('master.setting.index', compact('setting'));
    }

    public function update(SettingRequest $request, $id)
    {
        $data = $request->all();

        if ($request->logo) {
            $data['logo'] = $this->uploadImage($request);
        }

        Setting::find($id)->update($data);

        return redirect()->route('master.settings.index');
    }

    public function uploadImage(SettingRequest $request)
    {
        $upload_path = 'images/settings/';

        $image = $request->file('logo');
        if (is_file($image)) {
            $filename = $image->hashName();
            $img = $thumb = \Image::make($image->path());
        } else {
            $filename = basename($image);
            $img = $thumb = \Image::make($image);

            $mime = $img->mime();
            if ($mime == 'image/jpeg') {
                $extension = '.jpg';
            } elseif ($mime == 'image/png') {
                $extension = '.png';
            } elseif ($mime == 'image/gif') {
                $extension = '.gif';
            }

            $filename .= $extension;
        }

        $img->resize(800, 800, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();
        \Storage::disk('public')->put($upload_path . $filename, $img);
        
        return $filename;
    }
}