<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pmethod;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::orderBy('id','DESC')->get();
        return view('admin.purchase.all_purchase',compact('purchases'));
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


        $purchase['today_date'] = Carbon::parse($request->date)->format('Y-m-d');
        $purchase['reference_no'] = $request->reference_no;
        $purchase['note'] = $request->note;
        $purchase['supplier_id'] = $request->supplier_id;
        $purchase['product_id'] = $request->product_id;
        $purchase['pmethod_id'] = $request->pmethod_id;
        $purchase['available'] = $request->available;
        $purchase['quantity'] = $request->quantity;
        $purchase['cost'] = $request->cost_price;
        $purchase['subtotal'] = $request->subtotal;
        $purchase['instant_commisition'] = ($request->quantity * $request->instant_commisition);
        $purchase['monthly_commisition'] = ($request->quantity * $request->monthly_commisition);
        $purchase['yearly_commisition'] = ($request->quantity * $request->yearly_commisition);
        $purchase['transport_commisition'] = ($request->quantity * $request->transport_commisition);
        $purchase['extra_one_commisition'] = ($request->quantity * $request->extra1_commisition);
        $purchase['extra_two_commisition'] = ($request->quantity * $request->extra2_commisition);
        $purchase['payable_amount'] = $request->payable_amount;
        $purchase['paid_amount'] = $request->paid_amount;
        $purchase['due'] = ($request->payable_amount>$request->paid_amount)?$request->payable_amount-$request->paid_amount:0;
        $purchase['due_paid'] = 0.00;
        $purchase['return_amount'] = ($request->payable_amount<$request->paid_amount)?$request->paid_amount-$request->payable_amount:0;

        DB::table('purchases')->insert($purchase);


        DB::table('products')->where('id',$purchase['product_id'])
        ->update(['product_quantity' => DB::raw('product_quantity +' .$purchase['quantity'])]);

        $notification = array(
            'messege' => 'Product Purchase Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function show($id)
    {
        $viewPurchase = Purchase::findOrFail($id);  
        return view('admin.purchase.show_purchase',compact('viewPurchase'));
    }

    public function edit($id)
    {
        $editPurchase = Purchase::findOrFail($id);
        return view('admin.purchase.edit_purchase',compact('editPurchase'));
    }

    public function update(Request $request, $id)
    {
       
    }

    public function purchaseDelete($id)
    {
        Purchase::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Purchase Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
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

    public function DuePaid(Request $request)
    {
        
    }

     
}
