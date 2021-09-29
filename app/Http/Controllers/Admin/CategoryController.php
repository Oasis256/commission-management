<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.all_category',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'status' => 'required'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'status' => $request->status,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            'created_at' => Carbon::now()
        ]);


        $notification = array(
            'messege' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function show($id)
    {
     
    }

    public function edit($id)
    {
        $editCategory = Category::findOrFail($id);
        return view('admin.category.edit_category',compact('editCategory'));
    }

    public function update(Request $request, $id)
    {
    
        Category::where('id',$id)->update([
            'category_name' => $request->category_name,
            'status' => $request->status,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);

        $notification = array(
            'messege' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('category.index')->with($notification);
    

    }

    public function softDelete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Category Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
