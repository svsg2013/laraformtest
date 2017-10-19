<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeCategory;

class AjaxController extends Controller
{
    public function getTypecate($idCate){
    	$typecates= TypeCategory::where('idCate',$idCate)->get();
    	foreach ($typecates as $typecate) {
    		echo "<option value='".$typecate->id."'>".$typecate->name."</option>";
    	}
    }
}
