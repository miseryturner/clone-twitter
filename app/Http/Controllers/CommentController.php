<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id) {
        $comment = Comment::create([
            'idea_id' => $id,
            'content' => request()->get('content'),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('idea.show', $id)->with('success', 'Comment posted successfully!');
    }
}
