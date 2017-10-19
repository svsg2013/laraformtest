<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide= Slide::all();
        return view('admin.pages.slides.list')->with('slides',$slide);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.slides.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide= new Slide();
        $slide->name= $request->txtName;
        $slide->summary= $request->txtSum;
        $slide->link= $request->txtLink;
        if($request->hasFile('inputImg')){
            $file= $request->file('inputImg');
            $name= $file->getClientOriginalName();
            $file->move('uploads/slide',$name);
            $slide->image= $name;
        }
        $slide->save();
        return redirect()->route('slide.index')->with('thongbao','Slide Success!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide= Slide::find($id);
        return view('admin.pages.slides.show')->with('slides',$slide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide= Slide::find($id);
        return view('admin.pages.slides.edit')->with('slides',$slide);
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
        $slide= Slide::find($id);
        $slide->name= $request->txtName;
        $slide->summary= $request->txtSum;
        $slide->link= $request->txtLink;
        if($request->hasFile('inputImg')){
            $file= $request->file('inputImg');
            $name= $file->getClientOriginalName();
            $file->move('uploads/slide',$name);
            $slide->image= $name;
        }
        $slide->save();
        return redirect()->route('slide.index')->with('thongbao','Update, Slide Success!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide= Slide::find($id);
        $slide->delete();
        unlink('uploads/slide/'.$slide->image);
        return redirect()->route('slide.index')->with('thongbao','Delete Slide Success!!!');
    }
}
