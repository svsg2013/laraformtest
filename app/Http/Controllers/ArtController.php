<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\TypeCategory;
use App\Http\Requests\ArtRequest;
use Illuminate\Support\Facades\Input;
class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $art= Article::all();
        return view('admin.pages.news.list')->with('arts',$art);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate= Category::all();
        $typecate= TypeCategory::all();
        $art= Article::all();
        return view('admin.pages.news.add')->with(['arts'=>$art,'cates'=>$cate,'typecates'=>$typecate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtRequest $artrequest)
    {
        $art= new Article();
        $art->title= $artrequest->txtTitle;
        $art->alias= changeTitle($artrequest->txtTitle);
        $art->idTypeCate= $artrequest->slTypeCate;
        $art->summary= $artrequest->txtSum;
        $art->content= $artrequest->txtEditor;
        $art->keywords= $artrequest->txtKeywords;
        $art->description= $artrequest->txtDes;
        $art->featured= $artrequest->rdoStatus;
        $art->views= 0;
        if($artrequest->hasFile('inputImg')){
            $file= $artrequest->file('inputImg');
            $name= $file->getClientOriginalName();
            $file->move('uploads/tintuc',$name);
            $art->image= $name;
        }            
        $art->save();
        return redirect()->route('article.index')->with('thongbao','Article Success!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $cate= Category::all();
        $typecate= TypeCategory::all();
        $art= Article::find($id);
        return view('admin.pages.news.edit')->with(['arts'=>$art,'cates'=>$cate,'typecates'=>$typecate]);
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
        $art= Article::find($id);
        $art->title= $request->txtTitle;
        $art->alias= changeTitle($request->txtTitle);
        $art->idTypeCate= $request->slTypeCate;
        $art->summary= $request->txtSum;
        $art->content= $request->txtEditor;
        $art->keywords= $request->txtKeywords;
        $art->description= $request->txtDes;
        $art->featured= $request->rdoStatus;
        $art->views= 0;
        if($request->hasFile('inputImg')){
            $file= $request->file('inputImg');
            $name= $file->getClientOriginalName();
            $file->move('uploads/tintuc',$name);
            unlink('uploads/tintuc/'.$art->image);
            $art->image= $name;
        }            
        $art->save();
        return redirect()->route('article.index')->with('thongbao','Update Article Success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $art= Article::find($id);
            $art->delete();
            unlink('uploads/tintuc/'.$art->image);
        return redirect()->route('article.index')->with('thongbao','Delete Article!!!');
    }

    public function deleteall(){
        $checks=Input::get('check');
        foreach($checks as $key => $name){
            $this->destroy($key);
    }
    return redirect()->route('article.index')->with('thongbao','Delete Article!!!');
}
}
