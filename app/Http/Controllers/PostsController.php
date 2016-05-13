<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
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
		$all_articles = Post::where('user_id', Auth::id())->get();

		return response()->json($all_articles);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		Post::create(array(
			'title' => Input::get('title'),
			'content' => Input::get('content'),
			'user_id' => Auth::id(),
		));

		return response()->json(array('success'=>true, 'message'=>'Post Added' ));
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
		$article = Post::find($id);
		$article->update( $request->all() );

		return response()->json(array('success'=> true, 'message'=>'Post Edited'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$article = Post::find($id);
		$article->delete();

		return response()->json(array('success'=> true, 'message'=>'Post Deleted'));
	}
}