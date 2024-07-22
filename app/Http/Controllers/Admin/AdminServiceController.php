<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        $all_data = Service::orderBy('item_order','asc')->get();
        return view('admin.service_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.service_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:services',
            'short_description' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'item_order' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'banner' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Service();

        $ext = $request->file('photo')->extension();
        $final_name = 'service_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;

        $ext1 = $request->file('banner')->extension();
        $final_name1 = 'service_banner_'.time().'.'.$ext1;
        $request->file('banner')->move(public_path('uploads/'),$final_name1);
        $obj->banner = $final_name1;
        
        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->item_order = $request->item_order;
        $obj->save();

        return redirect()->route('admin_service_show')->with('success', 'Data is inserted successfully.');
    }


    public function edit($id)
    {
        $row_data = Service::where('id',$id)->first();
        return view('admin.service_edit',compact('row_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('services')->ignore($id)],
            'short_description' => 'required',
            'description' => 'required',
            'icon' => 'required',
            'item_order' => 'required'
        ]);

        $obj = Service::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'service_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        if($request->hasFile('banner')) {
            $request->validate([
                'banner' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->banner));

            $ext = $request->file('banner')->extension();
            $final_name = 'service_banner_'.time().'.'.$ext;

            $request->file('banner')->move(public_path('uploads/'),$final_name);

            $obj->banner = $final_name;
        }

        $obj->name = $request->name;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->icon = $request->icon;
        $obj->seo_title = $request->seo_title;
        $obj->seo_meta_description = $request->seo_meta_description;
        $obj->item_order = $request->item_order;
        $obj->update();

        return redirect()->route('admin_service_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $row_data = Service::where('id',$id)->first();
        unlink(public_path('uploads/'.$row_data->photo));
        unlink(public_path('uploads/'.$row_data->banner));
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
