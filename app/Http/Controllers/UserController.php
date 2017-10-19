<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user= User::all();
       return view('admin.pages.users.list')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userrequest)
    {
       $user = new User();
       $user->username= $userrequest->txtName;
       $user->password= bcrypt($userrequest->txtPass);
       $user->email= $userrequest->txtMail;
       $user->level=0;
       $user->remember_token= $userrequest->_token;
       $user->save();
       return redirect()->route('user.index')->with('thongbao','Create Successful Username');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= User::find($id);
        return view('admin.pages.users.show')->with('users',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        return view('admin.pages.users.edit')->with('users',$user);
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
            'txtRPass'=>'same:txtPass',
            ]);
        $user= User::find($id);
        $user->username= $request->txtName;
        $user->password= bcrypt($request->txtPass);
        $user->level= $request->rdoStatus;
        $user->save();
        return redirect()->route('user.index')->with('thongbao','Update Sucess!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('thongbao','Delete Ok!');
    }
}
