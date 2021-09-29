<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Image;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.all_brand',compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.add_brand');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg',
        ]);

       if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::insert([
                'brand_name' => $request->brand_name,
                'status' => $request->status,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
       }else{

            Brand::insert([
                'brand_name' => $request->brand_name,
                'status' => $request->status,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name)),
                'created_at' => Carbon::now()
            ]);

       }

        $notification = array(
            'messege' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.index')->with($notification);
    }

    public function show($id)
    {
     
    }

    public function edit($id)
    {
        $editBrand = Brand::findOrFail($id);
        return view('admin.brand.edit_brand',compact('editBrand'));
    }

    public function update(Request $request, $id)
    {
        $old_image = $request->oldimage;

        if($request->file('image')){
            $image = $request->file('image');
            if(file_exists($old_image)){
                unlink($old_image);
            }
            $name_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

        Brand::where('id',$id)->update([
            'brand_name' => $request->brand_name,
            'status' => $request->status,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name)),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'messege' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );
            return redirect()->route('brand.index')->with($notification);

        }else{

            Brand::where('id',$id)->update([
                'brand_name' => $request->brand_name,
                'status' => $request->status,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name)),
            ]);
    
            $notification = array(
                'messege' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('brand.index')->with($notification);
    
        }//end else

    }

    public function softDelete($id)
    {
        Brand::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Brand Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
