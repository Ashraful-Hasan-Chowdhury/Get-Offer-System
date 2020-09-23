<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Shop;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
    	$shops = Shop::all();
    	return view('shopadmin.offer.create',compact('shops'));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
        ]);
        $offer = new Offer;
        $image_url=' ';
    	$image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/offer-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        $offer->title = $request->title;
        $offer->startingdate = $request->startingdate;
        $offer->expirydate =$request->expirydate;
        $offer->details = $request->details;
        $offer->image = $image_url;
        $offer->save();
        $offer->shops()->sync($request->shops);
        $notification = array(
        	'message' => 'Offer Added Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function view(){
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('shopadmin.offer.show',compact('offers'));
    }
    public function destroy($id){
        $offer = Offer::findorfail($id);
        $image = $offer->pImage;
        if($image != null){  
            unlink($image);
        }
        $offer->delete();

        $notification = array(
            'message' => 'Offer Deleted!',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $offer = Offer::findorfail($id);
        $shops=Shop::all();
        return view('shopadmin.offer.edit',compact('offer','shops'));
    }

    public function update(Request $request,$id){
        $offer=Offer::findorfail($id);
        $image_url=' ';
        $image = $request->file('image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/offer-image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }
        else{
            $image_url=$request->old_photo;
        }
        $offer->title = $request->title;
        $offer->startingdate = $request->startingdate;
        $offer->expirydate = $request->expirydate;
        $offer->details = $request->details;
        $offer->image = $image_url;
        $offer->shops()->detach();
        $offer->save();
        $offer->shops()->sync($request->shops);
        $notification = array(
        	'message' => 'Offer Updated Successfully!',
        	'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification,$offer);
    }
    // Admin Side
    public function viewOffersAdmin(){
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('admin.offer.show',compact('offers'));
    }
    public function readOfferAdmin($id){
        $offer = Offer::findorfail($id);
        $shops=Shop::all();
        return view('admin.offer.edit',compact('offer','shops'));
    }
    // User Side
    public function viewAll(){
        $offers = Offer::with('shops')->orderBy('created_at', 'DESC')->paginate(4);
        $type = null;
        // return response()->json($offers[0]->shops);
        return view('user.offer.offer',compact('offers','type'));
    }
    public function show(Request $request){
        $lat=$request->lat;
        $lng=$request->lng;
        // $offer=Offer::with('shops')->paginate(4);
        $shops=Shop::with('offers')->whereBetween('lat',[$lat-0.2,$lat+0.2])->whereBetween('lng',[$lng-0.2,$lng+0.2])->paginate(4);
        return response()->json($shops);
    }
    public function placeDetailsAjax($id){
        return ['redirect' => route('offer.details',$id)];
    } 
    public function placeDetailsLaravel($id){
        $offer=Offer::findorfail($id);
        return view('user.offer.show',compact('offer'));
    }
    public function search(Request $request){
        $type = $request->type;
        $offers = Offer::with('shops')->orderBy('created_at', 'DESC')->paginate(4);
        return view('user.offer.offer',compact('offers','type'));
    }

}
