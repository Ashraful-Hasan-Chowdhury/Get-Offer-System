<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function shops(){
        return $this->belongsToMany('App\Shop','offer_shops')->withTimeStamps();
    }
}
