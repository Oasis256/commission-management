<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::findOrFail(1);
        return view('admin.profile.admin_profile',compact('adminData'));
    }

    public function adminProfileEdit()
    {
        $editData = Admin::findOrFail(1);
        return view('admin.profile.admin_edit',compact('editData'));
    }

    public function adminProfileStore(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/admin/'.$data->profile_photo_path));
            $file_name = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin/'),$file_name);
            $data['profile_photo_path'] = $file_name;
        }
        $data->save();
        $notification = array(
            'messege' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    //end metnod

    public function UpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',

        ]);

        $hash_password = Admin::findOrfail(1)->password;

        if(Hash::check($request->current_password,$hash_password)){
            $admin =  Admin::findOrfail(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
           Auth::logout();
           $notification = array(
            'messege' => 'Admin Password Updated Successfully',
            'alert-type' => 'success'
           );
            return redirect()->route('admin.logout')->with($notification);
        }else{
            
            $notification = array(
                'messege' => "password doesn't match? ",
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        
        

    }
}
