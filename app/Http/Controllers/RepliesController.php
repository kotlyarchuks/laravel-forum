<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index($category, Thread $thread){
        return $thread->replies()->paginate(15);
    }

    public function store($category, Thread $thread)
    {
        $validated = request()->validate([
            'body' => 'required|min:2',
        ]);

        $reply = $thread->addReply([
            'body' => $validated['body'],
            'user_id' => auth()->id(),
        ]);

        if(request()->expectsJson()){
            return $reply->load('user');
        }

        return back()->with('flash', 'Reply has been added!');
    }

    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $validated = request()->validate([
            'body' => 'required|min:2',
        ]);

        $reply->update($validated);
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();
    }
}
