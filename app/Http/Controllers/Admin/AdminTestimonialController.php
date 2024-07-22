<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $all_data = Testimonial::orderBy('id','asc')->get();
        return view('admin.testimonial_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.testimonial_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $obj = new Testimonial();

        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);
        $obj->photo = $final_name;
        
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin_testimonial_show')->with('success', 'Data is inserted successfully.');
    }

    public function edit($id)
    {
        $row_data = Testimonial::where('id',$id)->first();
        return view('admin.testimonial_edit',compact('row_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        $obj = Testimonial::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->route('admin_testimonial_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $row_data = Testimonial::where('id',$id)->first();
        unlink(public_path('uploads/'.$row_data->photo));
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
