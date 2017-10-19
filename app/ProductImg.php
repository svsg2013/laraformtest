<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table= 'product_imgs';

    public function product(){
    	return $this->belongsTo('App\Product','idProduct','id');
    }
}
