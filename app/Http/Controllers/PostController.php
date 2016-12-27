<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use App\Post;
use Purifier;

class PostController extends Controller
{
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
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('posts.index')->with('posts', $posts);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'author' => 'required|max:50',
            'body' => 'required'
            ));

        $post = new Post;

        $post->title = $request->title;
        $post->author = $request->author;
        $post->body = Purifier::clean($request->body);

        $post->save();

        Session::flash('success', 'El post se ha subido correctamente!');

        return redirect()->route('admin.posts.show', [$post->id]);

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
        return view('posts.show')->with('post', $post);
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
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required|max:50',
            'body' => 'required'
            ]);

        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = Purifier::clean($request->input('body'));

        $post->save();

        Session::flash('success', 'El post se ha modificato correctamente!');

        return redirect()->route('admin.posts.show', [$post->id]);

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

        $post->delete();

        Session::flash('success', 'El post ha sido borrado con éxito!');
        return redirect()->route('admin.posts.index');
    }
}
