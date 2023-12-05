<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $post = Post::all();
        } else {
            $post = Post::where('author_id', Auth::user()->id)
                ->get();
        }

        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::all();
        } else {
            $user = Auth::user();
        }
        $categories = Category::all();

        $data = array(
            'user' => $user,
            'categories' => $categories,
        );

        return view('admin.post.manage', $data);
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
            'author_id' => ['required'],
            'thumbnail' => ['required'],
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:5'],
            'categorys' => ['required']
        ]);

        $data = $request->except('_token');
        $data['status'] = 'Draft';
        $categorys = $data['categorys'];

        $image = $request->file('thumbnail');

        if ($request->hasFile('thumbnail')) {
            $file_name = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/post', $file_name);

            $data['thumbnail'] = $file_name;

            $post = Post::create($data);


            foreach ($categorys as $key => $value) {
                PostCategory::create([
                    'post_id' => $post->id,
                    'category_id' => $value,
                ]);
            }
        }

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorFail($id);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        if (Auth::user()->role == 'Admin') {
            $user = User::all();
        } else {
            $user = Auth::user();
        }
        $categories = Category::all();

        $data = array(
            'user' => $user,
            'categories' => $categories,
            'post' => $post,
        );

        return view('admin.post.manage', $data);
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
            'author_id' => ['required'],
            // 'thumbnail' => ['required'],
            'title' => ['required', 'min:5'],
            'content' => ['required', 'min:5'],
            'categorys' => ['required']
        ]);

        $post = Post::findorFail($id);
        $data = $request->except('_token');
        $categorys = $data['categorys'];

        $image = $request->file('thumbnail');

        if (!empty($image)) {
            $old_path = 'public/post/' . $post->thumbnail;
            Storage::delete($old_path);

            $file_name = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/post', $file_name);

            $data['thumbnail'] = $file_name;
        }

        $post->update($data);
        $post->categories()->sync($categorys);


        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);

        $thumbnail_path = 'public/post/' . $post->thumbnail;
        Storage::delete($thumbnail_path);

        $post->categories()->detach();
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully');
    }
}
