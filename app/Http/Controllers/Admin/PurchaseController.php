<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pmethod;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('id','DESC')->get();
        $pemthods = Pmethod::where('status',1)->get();
        return view('admin.purchase.add_purchase',compact('suppliers','pemthods'));
    }

    public function store(Request $request)
    {

      //return $request;


        $request->validate([
            'date' => 'required',
            'supplier_id' => 'required',
            'pmethod_id' => 'required',
            'product_id' => 'required',
            'reference_no' => 'required',
        ],[
            'supplier_id.required' => 'Supplier field is required',
            'pmethod_id.required' => 'Payment method field is required',
            'product_id.required' => 'Product field is required'
        ]);

        $purchase = new Purchase();
        $purchase->today_date = Carbon::now();
        $purchase->reference_no = $request->reference_no;
        $purchase->note = $request->note;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->product_id = $request->product_id;
        $purchase->pmethod_id = $request->pmethod_id;
        $purchase->available = $request->available;
        $purchase->quantity = $request->quantity;
        $purchase->cost = $request->cost_price;
        $purchase->subtotal = $request->subtotal;
        $purchase->instant_commisition = $request->instant_commisition;
        $purchase->monthly_commisition = $request->monthly_commisition;
        $purchase->yearly_commisition = $request->yearly_commisition;
        $purchase->transport_commisition = $request->transport_commisition;
        $purchase->extra_one_commisition = $request->extra1_commisition;
        $purchase->extra_two_commisition = $request->extra2_commisition;
        $purchase->payable_amount = $request->payable_amount;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->due = ($request->payable_amount>$request->paid_amount)?$request->payable_amount-$request->paid_amount:0;
        $purchase->due_paid = ($request->payable_amount>$request->paid_amount)?$request->payable_amount-$request->paid_amount:0;
        $purchase->return_amount = ($request->payable_amount<$request->paid_amount)?$request->paid_amount-$request->payable_amount:0;;

        $purchase->save();

        $notification = array(
            'messege' => 'Product Purchase Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getAutocomplete(Request $request){

        $search = $request->search;
        if($search == ''){
           $autocomplate = Product::orderby('product_name','asc')->select('id','product_name')->get();
        }else{
           $autocomplate = Product::orderby('product_name','asc')->select('id','product_name')->where('product_name', 'like', '%' .$search . '%')->get();
        }
  
        $response = array();
        foreach($autocomplate as $autocomplate){
           $response[] = array("value"=>$autocomplate->id,"label"=>$autocomplate->product_name);
        }
  
        echo json_encode($response);
        
     }

     public function getSupplierProducts(Request $request){
         //return $request;
           $products = Product::where(['supplier_id' => $request->id])->get();
           return response()->json($products);
     }

     public function getProducts(Request $request){
        //return $request;
          $product = Product::where(['id' => $request->id])->firstOrFail();
          return response()->json($product);
    }

     
}
