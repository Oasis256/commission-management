<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use Carbon\Carbon;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::latest()->get();
        return view('admin.unit.all_unit',compact('units'));
    }

    public function create()
    {
        return view('admin.unit.add_unit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|unique:units|max:50',
            'short_name' => 'required|unique:units|max:50',
            'status' => 'required'
        ]);

        Unit::insert([
            'unit_name' => $request->unit_name,
            'short_name' => $request->short_name,
            'unit_slug' => strtolower(str_replace(' ','-',$request->unit_name)),
            'unit_details' => $request->unit_details,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'messege' => 'Unit Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('unit.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editUnit = Unit::findOrFail($id);
        return view('admin.unit.edit_unit',compact('editUnit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|max:50',
            'short_name' => 'required|max:50'
        ]);

        Unit::where('id',$id)->update([
            'unit_name' => $request->unit_name,
            'short_name' => $request->short_name,
            'unit_slug' => strtolower(str_replace(' ','-',$request->unit_name)),
            'unit_details' => $request->unit_details,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'messege' => 'Unit Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('unit.index')->with($notification);
    }

    public function softDelete($id)
    {
        Unit::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Unit Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
