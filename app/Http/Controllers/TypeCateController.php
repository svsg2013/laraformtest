<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeCategory;
use App\Category;

class TypeCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typecate= TypeCategory::all();
        return view('admin.pages.typecategory.list')->with('typecates',$typecate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    //pluck dung cho Form::select('name',$cate,null)
    {   $cate= Category::all()->pluck('name','id');
        return view('admin.pages.typecategory.add')->with('cates',$cate);
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
            'txtName'=>'required|unique:type_categories,name',
            'slName'=>'required',
            ],[
            'txtName.required'=>'Input Type Category, please!',
            'txtName.unique'=>'Type Category name existed',
            'slName.required'=>'Your choose Type Category name, please!'
            ]);
        $typecate= new TypeCategory();
        $typecate->name= $request->txtName;
        $typecate->alias=changeTitle($request->txtName);
        $typecate->idCate= $request->slName;
        $typecate->save();
        return redirect()->route('typecate.index')->with('thongbao','Type Category Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typecate= TypeCategory::find($id);
        return view('admin.pages.typecategory.show')->with('typecates',$typecate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate= Category::all()->pluck('name','id')->toArray();
        $typecate= TypeCategory::find($id);
        return view('admin.pages.typecategory.edit')->with(['typecates'=>$typecate,'cates'=>$cate]);
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
        $typecate= TypeCategory::find($id);
        $typecate->name= $request->txtName;
        $typecate->alias=changeTitle($request->txtName);
        $typecate->idCate= $request->slName;
        $typecate->save();
        return redirect()->route('typecate.index')->with('thongbao','Update, Type Category Success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeCategory::destroy($id);
        return redirect()->route('typecate.index')->with('thongbao','Delete Success!');
    }
}
