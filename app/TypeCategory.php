<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
	//type_categories trong bang csdl
    protected $table= 'type_categories';

    public function article(){
    	return $this->hasMany('App\Article','idTypeCate','id');
    }

    public function category(){
    	return $this->belongsTo('App\Category','idCate','id');
    }

}
