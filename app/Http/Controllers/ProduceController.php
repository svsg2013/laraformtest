<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Produces\ProduceRepositoryInterface;
use App\Product;
use App\CateProduct;
use App\ProductImg;
use File;
use Illuminate\Support\Facades\Input;

class ProduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $produce;
    public function __construct(ProduceRepositoryInterface $produceRepositoryInterface){
        $this->produce= $produceRepositoryInterface;
    }

    public function index()
    {
        $products= $this->produce->getall();
        return view('admin.pages.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateproducts= CateProduct::select('id','name','idParent')->get()->toArray();
        return view('admin.pages.product.add',compact('cateproducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->produce->getInputPostAndEdit($request->all());
        return redirect()->route('product.index')->with('thongbao','Add Product Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product= $this->produce->find($id);
        //$catepro= Product::find($id);
        $parent= CateProduct::select('id','name','idParent')->get()->toArray();
        $imgs=ProductImg::where('idProduct',$id)->get();
        return view('admin.pages.product.edit',compact(['product','catepro','parent','imgs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->produce->getInputPostAndEdit($request->all(),$id);
        return redirect()->route('product.index')->with('thongbao','Add Product Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   //productimg dc truy van qua model Product thong qua hasmany
        $prod_img_detail= Product::find($id)->productimg;

        foreach ($prod_img_detail as $prodImgDetail){
            File::delete('uploads/products/product/'.$prodImgDetail->name);
            $prodImgDetail->delete();
        }
        $prodImg= Product::find($id);
        unlink('uploads/products/thumbnail/'.$prodImg->image);
        $prodImg->delete();
        return redirect()->route('product.index')->with('thongbao','Delete Success!!!');
    }

    public function deleteall(){
        $checks= Input::get('check');
        if(isset($checks)){
            foreach($checks as $key => $check){
                $this->destroy($key);
            }
            return redirect()->route('product.index')->with('thongbao','Delete Success!!!');
        }
    }
}
