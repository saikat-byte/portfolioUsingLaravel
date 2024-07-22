<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting_data = Setting::where('id',1)->first();
        return view('admin.setting', compact('setting_data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'footer_copyright' => 'required',
            'theme_color' => 'required'
        ]);

        $obj = Setting::where('id',1)->first();

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo_'.time().'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'),$final_name);
            $obj->logo = $final_name;
        }

        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->favicon));
            $ext1 = $request->file('favicon')->extension();
            $final_name1 = 'favicon_'.time().'.'.$ext1;
            $request->file('favicon')->move(public_path('uploads/'),$final_name1);
            $obj->favicon = $final_name1;
        }

        if($request->hasFile('logo_footer')) {
            $request->validate([
                'logo_footer' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->logo_footer));
            $ext2 = $request->file('logo_footer')->extension();
            $final_name2 = 'logo_footer_'.time().'.'.$ext2;
            $request->file('logo_footer')->move(public_path('uploads/'),$final_name2);
            $obj->logo_footer = $final_name2;
        }

        $obj->footer_text = $request->footer_text;
        $obj->footer_icon_1 = $request->footer_icon_1;
        $obj->footer_icon_1_url = $request->footer_icon_1_url;
        $obj->footer_icon_2 = $request->footer_icon_2;
        $obj->footer_icon_2_url = $request->footer_icon_2_url;
        $obj->footer_icon_3 = $request->footer_icon_3;
        $obj->footer_icon_3_url = $request->footer_icon_3_url;
        $obj->footer_icon_4 = $request->footer_icon_4;
        $obj->footer_icon_4_url = $request->footer_icon_4_url;
        $obj->footer_copyright = $request->footer_copyright;
        $obj->preloader_status = $request->preloader_status;
        $obj->theme_color = $request->theme_color;
        $obj->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }
}
