<?php

namespace App\Http\Controllers;

use App\Shopadmin;
use Illuminate\Http\Request;

class ShopadminShopController extends Controller
{
    public function index(){
    	$profile = Shopadmin::findorfail(auth('shopadmin')->id());
    	return view('shopadmin.profile.profile',compact('profile'));
    }
    public function show(){
    	$shopadmin = Shopadmin::all();
    	return view('admin.shopadmin.show',compact('shopadmin'));
    }
    public function single($id){
    	$profile = Shopadmin::findorfail($id);
    	return view('admin.shopadmin.edit',compact('profile'));
    }
    public function approve($id){
    	$profile = Shopadmin::findorfail($id);
    	$profile->approve = 'yes';
    	$profile->save();
    	$notification = array(
        	'message' => 'Profile Approved!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request){
    	
        $shopadmin = Shopadmin::findorfail(auth('shopadmin')->id());
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/hotel-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image2_url=$request->old_photo;
        }

        $image2_url=' ';
        $image2 = $request->file('hotel_doc');
        if ($image2) {
            $image2_name = hexdec(uniqid());
            $ext2 = strtolower($image2->getClientOriginalExtension());
            $image2_full_name = $image2_name . '.' . $ext;
            $upload2_path = 'public/hotel-image/';
            $image2_url = $upload2_path . $image2_full_name;
            $success2 = $image2->move($upload2_path, $image2_full_name);
        }
        else{
            $image2_url=$request->old_doc;
        }

        $image3_url=' ';
        $image3 = $request->file('nid');
        if ($image3) {
            $image3_name = hexdec(uniqid());
            $ext3 = strtolower($image3->getClientOriginalExtension());
            $image3_full_name = $image3_name . '.' . $ext;
            $upload3_path = 'public/hotel-image/';
            $image3_url = $upload3_path . $image3_full_name;
            $success3 = $image3->move($upload3_path, $image3_full_name);
        }
        else{
            $image3_url=$request->old_nid;
        }

        $shopadmin->name = $request->name;
        $shopadmin->mobile = $request->phone;
        $shopadmin->shop_doc = $image2_url;
        $shopadmin->nid = $image3_url;
        $shopadmin->image = $image_url;
        $shopadmin->save();

        $notification = array(
        	'message' => 'Profile Updated Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
