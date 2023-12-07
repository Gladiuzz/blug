<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'comment' => ['required'],
        ]);

        $data = $request->except('_token');

        if (Auth::check()) {
            $data['user_id'] = Auth::user()->id;
        }

        Comment::create($data);

        return redirect()->back()->with('success', 'Comment created successfully');
    }
}
