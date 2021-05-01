<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with('post',Post::all())
        ->with('user',User::all())
        ->with('category',Category::all())
        ->with('tag',Tag::all())
        ->with('tarshed_post',Post::onlyTrashed()->get()->count());
        ;
    }
}
