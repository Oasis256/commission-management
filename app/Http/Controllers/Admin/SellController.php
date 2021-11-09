<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pmethod;
use App\Models\Product;
use App\Models\Sell;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function sellList()
    {
        $sells = Sell::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.sell.sell_list',compact('sells'));
    }

    public function sellAdd(Request $request)
    {
       $customers = Customer::orderBy('id','DESC')->get();
       $payments = Pmethod::where('status',1)->orderBy('id','DESC')->get();
       $products = Product::where('status',1)->orderBy('id','DESC')->get();
       return view('admin.sell.add_sell',compact('customers','payments','products'));
    }

    public function getProducts(Request $request){
        //return $request;
          $product = Product::where(['id' => $request->id])->firstOrFail();
          return response()->json($product);
    }

    public function sellStore(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'pmethod_id' => 'required',
            'product_id' => 'required',
        ],[
            'supplier_id.required' => 'Supplier field is required',
            'pmethod_id.required' => 'Payment method field is required',
            'product_id.required' => 'Product field is required'
        ]);

        $sell['date'] = Carbon::parse($request->date)->format('Y-m-d');
        $sell['product_id'] = $request->product_id;
        $sell['customer_id'] = $request->customer_id;
        $sell['pmethod_id'] = $request->pmethod_id;
        $sell['invoice_no'] = $request->invoice_no;
        $sell['payable_amount'] = $request->payable_amount;
        $sell['paid_amount'] = $request->paid_amount;
        $sell['due'] = $request->due;
        $sell['quantity'] = $request->quantity;
        $sell['paid_due'] = 0;

        DB::table('sells')->insert($sell);

        DB::table('products')->where('id',$sell['product_id'])
        ->update(['product_quantity' => DB::raw('product_quantity -' .$sell['quantity'])]);

        $notification = array(
            'messege' => 'Product Sell Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('sell.list')->with($notification);

    }

    public function sellView($id)
    {
        $sellview = Sell::findOrFail($id);
        return view('admin.sell.view_sell',compact('sellview'));
    }

    public function Duepaid($id)
    {
        $CustomerDue = Sell::findOrFail($id);
        return view('admin.sell.due_paid',compact('CustomerDue'));
    }

    public function sellDelete($id)
    {
        $sellDelete = Sell::findOrFail($id);
        $sellDelete->update([
            'status' => 0
        ]);
        $notification = array(
            'messege' => 'Sell Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function SellReport()
    {
        $date = date('Y-m-d');
        $sells = Sell::where('status',1)->where('date',$date)->orderBy('id','DESC')->paginate(3);
        return view('admin.sell.sell_report',compact('sells'));
    }

    public function todaySellReport()
    {
        $date = date('Y-m-d');
        $sells = Sell::where('status',1)->where('date',$date)->orderBy('id','DESC')->get();
        return view('admin.sell.today_sell_report',compact('sells'));
        
    }

    public function SevenDaysSellReport()
    {
        $date = Carbon::now()->subDays(7);;
        $sells = Sell::where('status',1)->where('date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.sell.today_sell_report',compact('sells'));
    }

    public function MonthSellReport()
    {
        $date = Carbon::now()->subDays(30);;
        $sells = Sell::where('status',1)->where('date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.sell.today_sell_report',compact('sells'));
    }

    public function YearSellReport()
    {
        $date = Carbon::now()->subDays(365);;
        $sells = Sell::where('status',1)->where('date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.sell.today_sell_report',compact('sells'));
    }

    public function FormToGet(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ],[
            'start_date.required' => 'Start Date field is required',
            'end_date.required' => 'End Date method field is required',
        ]);

        $start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d');

        $sells = Sell::whereBetween('date',[$start_date,$end_date])->get();
        return view('admin.sell.today_sell_report',compact('sells'));
       

    }

}
