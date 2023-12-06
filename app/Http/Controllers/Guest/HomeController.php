<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('role', '!=' ,'Admin')
        ->get();
        $post = Post::take(5)
        ->orderBy('id', 'desc')
        ->get();

        $category = Category::all();

        $data = array(
            'category' => $category,
            'user' => $user,
            'post' => $post,

        );

        return view('welcome', $data);
    }

    public function postDetail($title)
    {
        $category = Category::all();
        $post = Post::where('title', $title)
        ->first();



        return view('guest.post.post_detail', compact('post'));
    }
}
