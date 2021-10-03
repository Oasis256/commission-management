<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Supplier;

class SupplierController extends Controller
{
 
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.all_supplier',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.add_supplier');
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|unique:suppliers|max:50',
            'status' => 'required',
            'email' => 'required|email|unique:suppliers',
            'mobile' => 'required|unique:suppliers',
            'address' => 'required'
        ]);

        Supplier::insert([
            'supplier_name' => $request->supplier_name,
            'supplier_slug' => strtolower(str_replace(' ','-',$request->supplier_name)),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'status' => $request->status,
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'messege' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editSupplier = Supplier::findOrFail($id);
        return view('admin.supplier.edit_supplier',compact('editSupplier'));
    }

    public function update(Request $request, $id)
    {
        
        Supplier::where('id',$id)->update([
            'supplier_name' => $request->supplier_name,
            'supplier_slug' => strtolower(str_replace(' ','-',$request->supplier_name)),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'status' => $request->status,
            'updated_at' => Carbon::now()
        ]);


        $notification = array(
            'messege' => 'Supplier Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('supplier.index')->with($notification);
    }

    public function softDelete($id)
    {
        Supplier::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Supplier Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
