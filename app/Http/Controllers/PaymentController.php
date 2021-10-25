<?php

namespace App\Http\Controllers;

use App\Models\Pmethod;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function paymenIndex()
    {
        $pmethods = Pmethod::latest()->get();
        return view('admin.pmethod.all_pmethod',compact('pmethods'));
    }

    public function paymentCreate()
    {
        return view('admin.pmethod.add_pmethod');
    }

    public function paymentStore(Request $request)
    {
        $request->validate([
            'payment_name' => 'required|unique:pmethods',
            'status' => 'required'
        ]);

        Pmethod::insert([
            'payment_name' => $request->payment_name,
            'payment_details' => $request->payment_details,
            'payment_slug' => strtolower(str_replace(' ','-',$request->payment_name)),
            'status' => $request->status,
            
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'messege' => 'Payment Method Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('payment.index')->with($notification);
    }

    public function PaymentStatus($id, $status)
    {
        Pmethod::where('id',$id)->update(['status' => $status]);
        $notification = array(
            'messege' => 'Payment Method Updated Successfully',
            'alert-type' => 'success'
        );
        return response()->json($notification);
    }
    
}
