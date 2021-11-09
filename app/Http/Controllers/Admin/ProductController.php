<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Unit;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $singlesupplier = Supplier::where('status',1)->firstOrFail();
        //$purchase_product = Purchase::select('quantity')->where('product_id',$products)->sum('quantity');
        return view('admin.product.all_product',compact('products'));
    }

    public function create()
    {
        $units = Unit::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $suppliers = Supplier::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        return view('admin.product.add_product',compact('units','categories','suppliers','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
            'product_price' => 'required',
            'status' => 'required'
        ]);

       if($request->file('productImage')){
            $image = $request->file('productImage');
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/product/'.$name_gen);
            $save_url = 'upload/product/'.$name_gen;

            Product::insert([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'product_image' => $save_url,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
       }else{

            Product::insert([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);

       }

        $notification = array(
            'messege' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $units = Unit::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $suppliers = Supplier::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $editProduct = Product::findOrFail($id);
        return view('admin.product.edit_product',compact('editProduct','units','categories','suppliers','brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'required',
            'status' => 'required'
        ]);

        $oldImage = $request->oldImage;

       if($request->file('productImage')){
            $image = $request->file('productImage');
            if(file_exists($oldImage)){ unlink($oldImage); }
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/product/'.$name_gen);
            $save_url = 'upload/product/'.$name_gen;

            Product::where('id',$id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'alert_quantity' => $request->alert_quantity,
                'product_image' => $save_url,
                'status' => $request->status,
                'created_at' => Carbon::now()
            ]);
       }else{

            Product::where('id',$id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'supplier_id' => $request->supplier_id,
                'unit_id' => $request->unit_id,
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_price' => $request->product_price,
                'alert_quantity' => $request->alert_quantity,
                'status' => $request->status,
                'updated_at' => Carbon::now()
            ]);

       }

        $notification = array(
            'messege' => 'Product Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function softDelete($id)
    {
        Product::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Product Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
