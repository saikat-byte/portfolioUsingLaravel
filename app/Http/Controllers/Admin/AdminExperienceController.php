<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class AdminExperienceController extends Controller
{
    public function index()
    {
        $all_data = Experience::orderBy('item_order','asc')->get();
        return view('admin.experience_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.experience_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'time' => 'required',
            'item_order' => 'required'
        ]);

        $obj = new Experience();
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->time = $request->time;
        $obj->item_order = $request->item_order;
        $obj->save();

        return redirect()->route('admin_experience_show')->with('success', 'Data is inserted successfully.');
    }

    public function edit($id)
    {
        $row_data = Experience::where('id',$id)->first();
        return view('admin.experience_edit',compact('row_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'company' => 'required',
            'designation' => 'required',
            'time' => 'required',
            'item_order' => 'required'
        ]);

        $obj = Experience::where('id',$id)->first();
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->time = $request->time;
        $obj->item_order = $request->item_order;
        $obj->update();

        return redirect()->route('admin_experience_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $row_data = Experience::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }

}
