<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\AcceptedTask;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('created_at','desc')->take(5)->get();
        // $posts = Post::all();
        // $posts = Post::where('title','Post Two')->get();
        // Get Task
        $tasks = User::find(auth()->user()->id)->tasks;
        $aTasks = [];
        // Get Post ID
        foreach($tasks as $task){
            array_push($aTasks,$task->post->id);
        }
        $posts = Post::orderBy('created_at','desc')->whereNotIn('user_id',array(auth()->user()->id))->whereNotIn('id',$aTasks)->take(5)->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    public function accept($id){
        
        // Get post ID 
        $post = Post::find($id);
        $task = new AcceptedTask;
        $task->post_id = $id;
        $task->user_id = auth()->user()->id;
        $task->completed = 0;
        $task->save();

        return redirect('/posts')->with('success','Task Accepted');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File upload
        if($request->hasFile('cover_image')){
            // Get file with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileStore);
        }
        else{
            $fileStore = 'noimage.jpg';
        }

        // Create Post instance with Item
        $post = new Post;
        $post->title = $request->input('title');
        $post->detail = $request->input('detail');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileStore;
        // Save instance
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.post')->with('post', $post);
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

        // Check if user id is same with post
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');    
        }

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'detail' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle File upload
        if($request->hasFile('cover_image')){
            // Get file with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get only filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileStore);
        }

        // Create Post instance with Item
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->detail = $request->input('detail');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileStore;
        }
        // Save instance
        $post->save();

        return redirect('/posts')->with('success','Post Updated');
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

        // Check if user id is same with post
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');    
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success','Task Deleted');
    }

    public function decline($id){
        $task = AcceptedTask::find($id);
        // return $task->user_id;
        if($task->user_id != auth()->user()->id){
            return redirect('/dashboard')->with('error', 'Unauthorized User.');    
        }
        $task->delete();
        return redirect('/dashboard')->with('success', 'Task Removed.');
    }
}
