<?php

use App\Offer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	$homeOffers= Offer::paginate(3);
    return view('user.layouts.blog',compact('homeOffers'));
});
//CkEditor Routes
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

// Shopadmin Routes
// Shops - Shopadmin
Route::get('shopadmin/add-shop', 'ShopController@index')->name('add.shop');
Route::post('shopadmin/store-shop', 'ShopController@store')->name('store.shop');
Route::get('shopadmin/view-shops', 'ShopController@view')->name('view.shops');
Route::get('shopadmin/delete-shop/{id}', 'ShopController@destroy')->name('delete.shop');
Route::get('shopadmin/edit-shop/{id}', 'ShopController@edit')->name('edit.shop');
Route::post('shopadmin/update-shop/{id}', 'ShopController@update')->name('update.shop');

// Offers - Shopadmin
Route::get('shopadmin/add-offer', 'OfferController@index')->name('add.offer');
Route::post('shopadmin/store-offer', 'OfferController@store')->name('store.offer');
Route::get('shopadmin/view-offers', 'OfferController@view')->name('view.offers');
Route::get('shopadmin/delete-offer/{id}', 'OfferController@destroy')->name('delete.offer');
Route::get('shopadmin/edit-offer/{id}', 'OfferController@edit')->name('edit.offer');
Route::post('shopadmin/update-offer/{id}', 'OfferController@update')->name('update.offer');

// Shopadmin Profile
Route::get('shopadmin/profile', 'ShopadminShopController@index')->name('profile.admin');
Route::post('shopadmin/update-profile', 'ShopadminShopController@update')->name('update.admin');

// Admin Routes
// Shops - Admin
Route::get('admin/view-shops', 'ShopController@indexAdmin')->name('admin.view.shops');
Route::get('admin/view-shopadmins', 'ShopController@viewShopAdmin')->name('admin.view.shopadmins');
Route::get('admin/admin-shopadmin-delete/{id}', 'ShopController@destroyShopAdmin')->name('admin.shopadmin.delete');
Route::get('admin/view-offers', 'OfferController@viewOffersAdmin')->name('admin.offers.show');
Route::get('admin/read-offer/{id}', 'OfferController@readOfferAdmin')->name('admin.read.offer');

// View shopadmins
Route::get('admin/view-shopadmin', 'ShopadminShopController@show')->name('view.shopadmin');
Route::get('admin/single-shopadmin/{id}', 'ShopadminShopController@single')->name('single.shopadmin');
Route::get('admin/approve-shopadmin/{id}', 'ShopadminShopController@approve')->name('approve.shopadmin');

// User Routes
// Shops - User
Route::get('/shops', 'ShopController@viewAll')->name('shops');
Route::post('show-shop', 'ShopController@show');
Route::get('details-shop/{id}', 'ShopController@placeDetailsAjax');
Route::get('/shop-details/{id}', 'ShopController@placeDetailsLaravel')->name('shop.details');
// Offers - User
Route::get('/offers', 'OfferController@viewAll')->name('offers');
Route::post('show-offer', 'OfferController@show');
Route::get('details-offer/{id}', 'OfferController@placeDetailsAjax');
Route::get('/offer-details/{id}', 'OfferController@placeDetailsLaravel')->name('offer.details');
Route::get('/offer-search', 'OfferController@search')->name('offer.search');

// Scrapping
Route::get('/aarong', 'ScrapingController@aarong');
Route::get('/daraaz', 'ScrapingController@daraaz');
Route::get('/bkash', 'ScrapingController@bkash');
Route::get('/bajaj', 'ScrapingController@bajaj');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
