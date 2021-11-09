<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function ProductStock()
    {
       $stocks = Product::orderBy('id','DESC')->get();
       return view('admin.stock.product_stock',compact('stocks'));
    }

    public function PurchaseReport()
    {
        $date = date('Y-m-d');
        $purchases = Purchase::where('today_date',$date)->orderBy('id','DESC')->paginate(3);
        return view('admin.purchase.purchase_report',compact('purchases'));
    }

    public function todayPurchaseReport()
    {
        $date = date('Y-m-d');
        $purchases = Purchase::where('today_date',$date)->orderBy('id','DESC')->get();
        return view('admin.purchase.filter_purchase_report',compact('purchases'));
        
    }

    public function SevenDaysPurchaseReport()
    {
        $date = Carbon::now()->subDays(7);;
        $purchases = Purchase::where('today_date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.purchase.filter_purchase_report',compact('purchases'));
    }

    public function MonthPurchaseReport()
    {
        $date = Carbon::now()->subDays(30);;
        $purchases = Purchase::where('today_date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.purchase.filter_purchase_report',compact('purchases'));
    }

    public function YearPurchaseReport()
    {
        $date = Carbon::now()->subDays(365);;
        $purchases = Purchase::where('today_date','>=',$date)->orderBy('id','DESC')->get();
        return view('admin.purchase.filter_purchase_report',compact('purchases'));
    }

    public function FormToGetPurchase(Request $request)
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

        $purchases = Purchase::whereBetween('today_date',[$start_date,$end_date])->get();
        return view('admin.purchase.filter_purchase_report',compact('purchases'));
       

    }

    

    
}
