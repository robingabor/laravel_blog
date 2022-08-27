<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    // lets restrict what methods can be used without logging in
    public function __construct()
    {
        $this->middleware('auth',['except' => [
            'index','show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('updated_at','DESC')->get();
        // $post = Post::all();
        // dd($post);

        return view('blog.index')
            ->with('posts',$posts);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save the entered data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:5048'
        ]);

        // Generate new image name
        $newImageName =  uniqid() . '-' . $request->title . '.' .
        $request->image->extension();        
        
        // Lets move our image to public/images path from storage/app/public
        $request->image->move(public_path('images'), $newImageName);                               

        // // Finally lets create our Post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class,'slug',$request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id

        ]);

        // Succes message back
        return redirect('/blog')
            ->with('message', 'Your post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {             
          
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $string
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)    
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5048'
        ]);

        $newImageName =  uniqid() . '-' . $request->title . '.' .
        $request->image->extension(); 
        
        // Lets move our image to public/images path from storage/app/public
        $request->image->move(public_path('images'), $newImageName);  

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class,'slug',$request->title),
                'image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);

            return redirect('/blog')
                ->with('message','Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);

        $post->delete();

        return redirect('/blog')
                ->with('message','Your post has been deleted!');
    }
}
