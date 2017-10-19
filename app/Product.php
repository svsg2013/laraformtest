<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    public function productimg(){
    	return $this->hasMany('App\ProductImg','idProduct','id');
    }

    public function cateproduct(){
    	return $this->belongsTo('App\CateProduct','idCatePro','id');
    }
}
