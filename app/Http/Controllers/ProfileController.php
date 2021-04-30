<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required|email',
           'facebook'=>'required',
           'youtube'=>'required'
       ]);
      
        $user=Auth::user();
       if($request->hasFile('avatar')){
            $image_path=$user->profile->avatar;

            if(File::exists($image_path)){
                File::delete($image_path);
            }

            $image=$request->avatar;
            $new_name=time().$image->getClientOriginalName();
            $image->move('profile/',$new_name);

            $user->profile->avatar='profile/'.$new_name;
            $user->profile->save();
       }
            $user->name=$request->name;
            $user->email=$request->email;
            $user->profile->facebook=$request->facebook;
            $user->profile->youtube=$request->youtube;
            $user->profile->about=$request->about;
            $user->save();
            $user->profile->save();

            if($request->has('password')){
                $user->password=bcrypt($request->password);
                $user->save();
            }
            $request->session()->flash('success', 'Update Successfully');

            return redirect()->back();
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
