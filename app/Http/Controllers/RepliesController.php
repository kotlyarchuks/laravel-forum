<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($category, Thread $thread)
    {
        $validated = request()->validate([
            'body' => 'required|min:2',
        ]);

        return $thread->addReply([
            'body' => $validated['body'],
            'user_id' => auth()->id(),
        ]);
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();

        return back()->with('flash', 'Reply deleted');
    }
}
