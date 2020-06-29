<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function MongoDB\BSON\toJSON;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users=User::all();
        return  view('user.index',compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->only('facebook','twitter','instgram','linkedin');
        $User=new User();
            $User->name=$request->input('name');
            $User->email=$request->input('email');
            $User->password= Hash::make($request->input('password'));
            $User->phone=$request->input('phone');
            $User->address=$request->input('address');
            $User->websit= $request->input('websit');
            $User->about=$request->input('about');
            $User->link=$data;
            $User->save();
        $request->session()->flash('User', $User->name.'');
        return redirect()->route('user.index');    }

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
        $User =User::findORfail($id);
        return view('user.edit',compact('User'));
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
        $User=User::findOrfail($id);
        $data=$request->only('facebook','twitter','instgram','linkedin');
        $User->name=$request->input('name');
        $User->email=$request->input('email');
        $User->phone=$request->input('phone');
        $User->password=Hash::make($request->input('password'));
        $User->address=$request->input('address');
        $User->websit=$request->input('websit');
        $User->about=$request->input('about');
        $User->image=$request->input('image');
        $User->link= $data;
        $User->save();
        $request->session()->flash('User', $User->name.'');
        return  redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User=User::findOrfail($id);
        $User->delete();
        return  redirect()->route('user.index');
    }
}
