<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_articles = Post::where('user_id', Auth::id())->get();

        return view( 'users.articles.articles', ['articles_data'=> $all_articles] );
    }

    /**
     * Show creating page.
     *
     */
    public function create()
    {

        return view( 'users.articles.create');
    }

    /**
     * To Storing data.
     *
     */
    public function store(Requests\PostsRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Post::create( $data );

        return back()->with('message','Post Added');
    }

    /**
     * Deleting posts.
     *
     */
    public function destroy($id)
    {
        $article = Post::find($id);
        $article->delete();

        return back()->with('message','Post Deleted');
    }

    /**
     * Show editing page.
     *
     */
    public function edit($id)
    {
        $article = Post::find($id);

        return view('users.articles.edit',['article'=>$article]);
    }

    /**
     * Editing posts.
     *
     */
    public function update(Requests\PostsRequest $request, $id)
    {
        $article = Post::find($id);
        $article->update( $request->all() );

        return back()->with('message', 'Post Edited');
    }

}
