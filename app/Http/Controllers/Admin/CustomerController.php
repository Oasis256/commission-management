<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::orderBy('id','DESC')->get();
        return view('admin.customer.all_customer',compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.add_customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'unique:customers',
            'email' => 'email|unique:customers',
            'status' => 'required'
        ]);

        Customer::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'city' => $request->city,
            'age' => $request->age,
            'gender' => $request->gender,
            'status' => $request->status,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'messege' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.index')->with($notification);

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $editCustomer = Customer::findOrFail($id);
        return view('admin.customer.edit_customer',compact('editCustomer'));
    }

    public function update(Request $request, $id)
    {
        Customer::where('id',$id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'city' => $request->city,
            'age' => $request->age,
            'gender' => $request->gender,
            'status' => $request->status,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'messege' => 'Customer Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('customer.index')->with($notification);
    }

    public function CustomerDelete($id)
    {
        Customer::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Customer Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
