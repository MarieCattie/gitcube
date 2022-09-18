<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'text' => 'required',
            'repository' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $validated['text'];
        $comment->user_id = Auth::id();
        $comment->repository_id = $validated['repository'];

        $comment->save();
        return redirect()->back()->with('status', 'Комментарий добавлен');



    }
}
