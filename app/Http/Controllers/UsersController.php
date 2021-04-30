<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('admin');
    
    }
    public function index()
    {
        return view('users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt(12345678)
        ]);
        Profile::create([
            'user_id'=>$user->id
        ]);
        $request->session()->flash('success', 'User added Successfully');

        return redirect()->route('users.index');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user=User::find($id);

        $image_path=$user->profile->avatar;

        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $user->profile->delete();
        $user->delete();

        $request->session()->flash('danger','Deleted Successfully');
        return redirect()->back();
    }
    public function admin($id,Request $request){
        $user=User::find($id);
        $user->admin=1;
        $user->save();

        $request->session()->flash('success','Become admin');

        return redirect()->back();
    }
    public function not_admin($id,Request $request){
        $user=User::find($id);
        $user->admin=0;
        $user->save();

        $request->session()->flash('success','Not admin anymore');

        return redirect()->back();
    }
}
