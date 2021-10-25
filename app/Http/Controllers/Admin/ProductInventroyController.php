<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryProduct;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

;

class ProductInventroyController extends Controller
{
    public function index()
    {

        return view('admin.inventory.index');
    }

    public function create()
    {
        $products = Product::all();
        $units = Unit::all();
        return view('admin.inventory.create',compact('products','units'));
    }
    public function store(Request $request){

        $request->validate([
            'product_id' => 'required',
            'unit' => 'required',
            'quantity' => 'required'
            
        ]);

        $inventory = new InventoryProduct();
        $inventory->product_id = $request->product_id;
        $inventory->unit = $request->unit;
        $inventory->quantity = $request->quantity;
        $inventory->stock_in_date = now();
        $inventory->stock_by =(Auth::guard('admin')->check()) ? Auth::guard('admin')->user()->id: auth()->user()->id;
        $inventory->save();

        $notification = array(
            'messege' => 'Inventory Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('inventory.index')->with($notification);

    }
}
