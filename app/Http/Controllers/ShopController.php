<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Shopadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(){
    	return view('shopadmin.shop.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $shop = new Shop;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/shop-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $shop->name = $request->name;
        $shop->type = $request->type;
        $shop->lat = $request->lat;
        $shop->lng = $request->lng;
        $shop->address = $request->address;
        $shop->image = $image_url;
        $shop->save();
        $shop->shopadmins()->sync(auth('shopadmin')->id());
        $notification = array(
        	'message' => 'Shop Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function view(){
        $shops = Shop::all();
        return view('shopadmin.shop.show',compact('shops'));
    }
    public function destroy($id){
        $shop = Shop::findorfail($id);
        $image = $shop->pImage;
        if($image != null){  
            unlink($image);
        }
        $shop->delete();

        $notification = array(
            'message' => 'Shop Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $shop = Shop::findorfail($id);
        return view('shopadmin.shop.edit',compact('shop'));
    }

    public function update(Request $request,$id){
        $shop=Shop::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/shop-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $shop->name = $request->name;
        $shop->type = $request->type;
        $shop->lat = $request->lat;
        $shop->lng = $request->lng;
        $shop->address = $request->address;
        $shop->image = $image_url;
        $shop->save();
        
        $notification = array(
            'message' => 'Shop Updated Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$shop);
    }

    // Admin Side
    public function indexAdmin(){
        $shops = Shop::all();
        return view('admin.shop.show',compact('shops'));
    }

    public function viewShopAdmin(){
        $admins = Shopadmin::all();
        return view('admin.shop.showAdmin',compact('admins'));
    }
    public function destroyShopAdmin($id){
        $admin = Shopadmin::findorfail($id);
        $admin->delete();

        $notification = array(
            'message' => 'Shop Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
    // User Side
    public function viewAll(){
        return view('user.shop.shop');
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        $shops=Shop::whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($shops);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('shop.details',$id)];
        
    } 
    public function placeDetailsLaravel($id){
        $shop=Shop::findorfail($id);
        return view('user.shop.show',compact('shop'));
    }
}
