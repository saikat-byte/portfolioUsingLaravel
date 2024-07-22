<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class AdminSkillController extends Controller
{
    public function index()
    {
        $all_data = Skill::get();
        return view('admin.skill_show', compact('all_data'));
    }

    public function add()
    {
        return view('admin.skill_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required'
        ]);

        $obj = new Skill();
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->side = $request->side;
        $obj->save();

        return redirect()->route('admin_skill_show')->with('success', 'Data is inserted successfully.');
    }

    public function edit($id)
    {
        $row_data = Skill::where('id',$id)->first();
        return view('admin.skill_edit',compact('row_data'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'percentage' => 'required'
        ]);

        $obj = Skill::where('id',$id)->first();
        $obj->name = $request->name;
        $obj->percentage = $request->percentage;
        $obj->side = $request->side;
        $obj->update();

        return redirect()->route('admin_skill_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $row_data = Skill::where('id',$id)->first();
        $row_data->delete();

        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
