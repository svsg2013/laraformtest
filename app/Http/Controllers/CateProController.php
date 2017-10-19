<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CateProduct;

class CateProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catepro= CateProduct::all();
        return view('admin.pages.cateProduct.list')->with('catepros',$catepro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent= CateProduct::select('id','name','idParent')->get()->toArray();
        return view('admin.pages.cateProduct.add',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'txtName'=>'required|unique:cate_products,name',
            ],[
            'txtName.required'=>'Inpute Category Product, Please!',
            'txtName.unique'=>'Category Product Exist'
            ]);
        $catepro= new CateProduct();
        $catepro->name= $request->txtName;
        $catepro->alias= changeTitle($request->txtName);
        $catepro->idParent= $request->slName;
        $catepro->save();
        return redirect()->route('catepro.index')->with('thongbao','Category Product Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catepro= CateProduct::find($id);
        $parent= CateProduct::select('id','name','idParent')->get()->toArray();
        return view('admin.pages.cateProduct.edit',compact('catepro','parent','id'));
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
        $this->validate($request,[
            'txtName'=>'required|unique:cate_products,name',
            ],[
            'txtName.required'=>'Inpute Category Product, Please!',
            'txtName.unique'=>'Category Product Exist'
            ]);
        $catepro= new CateProduct();
        $catepro->name= $request->txtName;
        $catepro->alias= changeTitle($request->txtName);
        $catepro->idParent= $request->slName;
        $catepro->save();
        return redirect()->route('catepro.index')->with('thongbao','Update Category Product Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
