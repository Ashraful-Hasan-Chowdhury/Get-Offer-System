<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function shopadmins(){
        return $this->belongsToMany('App\Shopadmin','shopadmin_shops')->withTimeStamps();
    }
    public function offers(){
        return $this->belongsToMany('App\Offer','offer_shops')->withTimeStamps();
    }
}
