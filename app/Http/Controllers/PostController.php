<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
class PostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("posts/create")->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()); //desplay the code on url ...
        $this -> validate($request ,[
            "title" => "required" ,
            "content" => "required" ,
            "featured" => "required | image" , 
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);


        $post = new Post;
        $post->feature = 'uploads/posts/'.$featured_new_name;
        $post->title =  $request->title;
        $post->content =  $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title);
        $post->save();
        return redirect()->back();
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
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post)
        ->with('categories',Category::all());
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
        $post = Post::find($id);

        $this->validate($request,[
            "title"    => "required",
            "content"  => "required",
            "category_id"  => "required" 
            
        ]);


        if ( $request->hasFile('featured')  ) {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);

            $post->feature = 'uploads/posts/'.$featured_new_name;
    
        }

       // dd($post);
        $post->title =  $request->title;
        $post->content =  $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete($id);
        return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed() -> get();
        //dd($post);
        return view("posts/softdeletes")->with('posts',$post);
    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->restore();
            //dd($post);
            return redirect()->back();
    }
    public function hardDelete($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->forceDelete();
            //dd($post);
            return redirect()->back();
    }
}