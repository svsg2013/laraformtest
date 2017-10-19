<?php
namespace App\Repositories\Produces;
use App\Repositories\EloquentRepository;
use App\Product;
use App\CateProduct;
use App\ProductImg;
use Illuminate\Support\Facades\Input;
/**
 * Created by PhpStorm.
 * User: Barney
 * Date: 6/17/2017
 * Time: 8:05 PM
 */

class ProduceEloquentRepository extends EloquentRepository implements ProduceRepositoryInterface{

    protected $_post;

    public function getModel(){
        return \App\Product::class;
    }
    //....xu ly viet them tai day
    public function getall(){
        $products= Product::all();
        return $products;
    }
    public function getInputPostAndEdit($inputs,$id=0){
        if($id==0){
            $post= new Product();
            $post->name= $inputs['txtTitle'];
            $post->alias= changeTitle( $inputs['txtTitle']);
            $post->price= $inputs['txtPrice'];
            $post->summary= $inputs['txtSum'];
            $post->content= $inputs['txtEditor'];
            $post->keywords= $inputs['txtKeywords'];
            $post->description= $inputs['txtDes'];
            $post->idCatePro= $inputs['slCate'];
            if(Input::hasFile('inputImg')){
                $file= Input::file('inputImg');
                $name= $file->getClientOriginalName();
                $chaneName= str_random(4)."_".$name;
                $file->move('uploads/products/thumbnail',$chaneName);
                $post->image=$chaneName;
            }
            $post->save();
            $idProd= $post->id;
            if(Input::hasFile('inputImgs')){
                $fileImgs= Input::file('inputImgs');
                foreach($fileImgs as $fileImg){
                    if(isset($fileImg)){
                        $img= new ProductImg();
                        $nameImgs= $fileImg->getClientOriginalName();
                        $changeNameImg= str_random(4)."_".$name;
                        $fileImg->move('uploads/products/product',$changeNameImg);
                        $img->name= $changeNameImg;
                        $img->idProduct=$idProd;
                        $img->save();
                    }
                }
            }
        }else{
            $post= Product::find($id);
            $post->name= $inputs['txtTitle'];
            $post->alias= changeTitle( $inputs['txtTitle']);
            $post->price= $inputs['txtPrice'];
            $post->summary= $inputs['txtSum'];
            $post->content= $inputs['txtEditor'];
            $post->keywords= $inputs['txtKeywords'];
            $post->description= $inputs['txtDes'];
            $post->idCatePro= $inputs['slCate'];
            if(Input::hasFile('inputImg')){
                unlink('uploads/products/thumbnail/'.$post->image);
                $file= Input::file('inputImg');
                $name= $file->getClientOriginalName();
                $changeName= str_random(4)."_".$name;
                $file->move('uploads/products/thumbnail',$changeName);
                $post->image=$changeName;
        }
            $post->save();
            //lay mang array tu input::file
            if(Input::hasFile('inputImgs')){
                $fileImgs=Input::file('inputImgs');
                    foreach($fileImgs as $key => $fileImg){
                        if(isset($fileImg)){
                            $img= ProductImg::find($key);
                            unlink('uploads/products/product/'.$img->name);
                            $nameImg= $fileImg->getClientOriginalName();
                            $changeNameImg= str_random(4)."_".$nameImg;
                            $img->name= $changeNameImg;
                            $fileImg->move('uploads/products/product',$changeNameImg);
                            $img->save();
                        }
                    }
            }
        }
    }
}
