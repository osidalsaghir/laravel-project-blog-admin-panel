<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
class HomeUiController extends Controller
{
    public function index(){
        return view('SportHouse.index')
        ->with('blog_name',Setting::first()->blog_name)
        ->with('categories',Category::all()->take(3));
        /* 
        ->with('first_post',Post::orderBy('created_at','desc')->first())   to take the latest post 
        ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first()) to take the second latest post 
        ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first()) to take the third latest latest post 
        
        */
    }
}
