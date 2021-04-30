<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    function index(){
        return view('welcome')
        ->with('categories',Category::take(4)->get())
        ->with('post',Post::orderBy('created_at','desc')->first())
        ->with('secondpost',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
        ->with('thirdpost',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
        ->with('career',Category::find(8))
        ->with('tutorial',Category::find(6))
        ;
    }
    function singlePost($slug){
        
        $post=Post::where('slug',$slug)->first();
        
        $next_id=Post::where('id','>',$post->id)->min('id');
        $prev_id=Post::where('id','<',$post->id)->max('id');

        return view('single')
        ->with('post',$post)
        ->with('title',$post->title)
        ->with('categories',Category::take(5)->get())
        ->with('next',Post::find($next_id))
        ->with('prev',Post::find($prev_id))
        ->with('tags',Tag::all())
        ;
    }
    function category($id){
        
        $category=Category::find($id);

        return view('category')
        
        ->with('categorys',$category)
        ->with('title',$category->name)
        ->with('categories',Category::take(4)->get());
    }
    function tag($id){
        
        $tag=Tag::find($id);

        return view('tag')
        ->with('categories',Category::take(4)->get())
        ->with('tags',$tag)
        ->with('title',$tag->tag)
        ->with('tag',Tag::take(4)->get());
    }
}
