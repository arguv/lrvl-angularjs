<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\User;
use Illuminate\Pagination\PaginationServiceProvider;

class IndexController extends Controller
{
    /**
     * Show the application main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_Posts = Post::latest()->published()->paginate(3);

        foreach($all_Posts as $item){

            $idOfUser = $item->user_id;
            $userName = User::find($idOfUser)->name;
            $item->setAttribute('user_name', $userName);
        }

        return view('index')->with('posts_data', $all_Posts);
    }
}
