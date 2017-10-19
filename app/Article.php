<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table= 'articles';

    public function typecategory(){
    	return $this->belongsTo('App\TypeCategory','idTypeCate','id');
    }
}
