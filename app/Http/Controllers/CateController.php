<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cate= Category::all();
        return view('admin.pages.category.list')->with('cates',$cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add');
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
            'txtName'=>'required|unique:categories,name',
            ],[
            'txtName.required'=>'Input Category, Please!',
            'txtName.unique'=>'Category Existed',
            ]);
        $cate= new Category();
        $cate->name= $request->txtName;
        $cate->alias= changeTitle($request->txtName);
        $cate->save();
        return redirect()->route('category.index')->with('thongbao','Category success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate= Category::find($id);
        return view('admin.pages.category.show')->with('cates',$cate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate= Category::find($id);
        return view('admin.pages.category.edit')->with('cates',$cate);

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
            'txtName'=>'required|unique:categories,name',
            ],[
            'txtName.required'=>'Input Category, Please!',
            'txtName.unique'=>'Category Existed',
            ]);
        $cate= Category::find($id);
        $cate->name= $request->txtName;
        $cate->alias= changeTitle($request->txtName);
        $cate->save();
        return redirect()->route('category.index')->with('thongbao','Category success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('thongbao','Delete Success!');
    }
}
