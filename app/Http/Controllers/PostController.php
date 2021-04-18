<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();

        if(count($category)==0){

            Session::flash('info','You should create some category');

            return redirect()->back();
        }
        return view('Post.create')->with('categories',Category::all())
        ->with('tags',Tag::all());                               
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
            'title'=>'required|max:225',
            'content'=>'required',
            'feature'=>'required|image',
            'category_id'=>'required',
            'tag'=>'required'
        ]);
        $image=$request->feature;

        $new_name=time().$image->getClientOriginalName();

        $image->move('uploads/post',$new_name);

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'features'=>'uploads/post/'.$new_name,
            'slug'=>Str::slug($request->title)
        ]);
        $post->tags()->attach($request->tag);
        Session::flash('success','Post Create Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('post.edit')
        ->with('id',Post::find($id))
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);
        $post=Post::find($id);

        if($request->hasFile('feature')){

            $image_path=$post->features;

            $image=$request->feature;
            if(File::exists($image_path)){
                File::delete($image_path);
            }

            $new_name=time().$image->getClientOriginalName();
            $image->move('uploads/post',$new_name);
            $post->features='uploads/post/'.$new_name;
        }

        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->save();
        
        $post->tags()->sync($request->tag);
         
        Session::flash('success','Post Update Successfully');
        return redirect()->route('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return  redirect()->back();
    }
    public function trashed(){
        $post=Post::onlyTrashed()->get();
        
        return view('post.trashed')->with('posts',$post);
    }
    public function kill($id){

        $post=Post::withTrashed()->where('id',$id)->first();
        $image_path=$post->features; 

        if(File::exists($image_path)) {
            File::delete($image_path);
            $post->forceDelete();
            Session::flash('success','Post Deleted Permanetly');
            return redirect()->back();
        }    
    }
    public function restore($id){

        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Restore Succesfully');
        return redirect()->route('post');
    }
}
