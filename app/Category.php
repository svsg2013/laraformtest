<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//categories lay tu bang csdl
    protected $table= 'categories';

    public function typecategory(){
    	return $this->hasMany('App\TypeCategory','idCate','id');
    }

    public function article(){
    	return $this->hasManyThrough('App\Article','App\TypeCategory','idCate','idTypeCate','id');
    }
}
