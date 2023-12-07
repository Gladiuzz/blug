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
        $user = User::where('role', '!=', 'Admin')
            ->get();
        $post = Post::where('status', 'Published')
            ->orderBy('id', 'desc')
            ->paginate(6);

        $category = Category::all();

        $data = array(
            'category' => $category,
            'user' => $user,
            'post' => $post,

        );

        return view('welcome', $data);
    }

    public function blog(Request $request)
    {
        $user = User::where('role', '!=', 'Admin')
            ->get();
        $category = Category::all();

        $search = $request->search;
        $tag = $request->tag;

        $post = Post::query()
            ->where('status', 'Published')
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->whereHas('categories', function ($query) use ($tag) {
                $query->where('name', 'like', '%' . $tag . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(6);

        // if ($search) {
        //     $post = Post::orderBy('id', 'desc')
        //         ->where('title', 'like', '%' . $search . '%')
        //         ->get();
        // } else {
        //     $post = Post::orderBy('id', 'desc')
        //         ->get();
        // }

        $data = array(
            'search' => $search,
            'post' => $post,
            'user' => $user,
            'tag' => $tag,
            'category' => $category,
        );

        return view('guest.post.posts', $data);
    }

    public function blogDetail($title)
    {
        $post = Post::where('title', 'like', '%' . $title . '%')
            ->first();

        // dd($title);

        return view('guest.post.post_detail', compact('post'));
    }

    public function authorTitle($name)
    {
        $author = User::where('name', $name)
            ->first();
        $post = $author->paginatePost();

        $data = array(
            'author' => $author,
            'post' => $post
        );

        return view('guest.author.author_detail', $data);
    }
}
