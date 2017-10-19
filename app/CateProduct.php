<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateProduct extends Model
{
    protected $table= 'cate_products';

    public function product(){
    	return $this->hasMany('App\Product','idCatePro','id');
    }

    public function productimg(){
    	//counter img by post product
    	return $this->hasManyThrough('App\Product','App\ProductImg','idCatePro','idProduct','id');
    }

    public function getcate(){
        return $this->hasManyThrough('App\Product','idCatePro','id');
    }
}
