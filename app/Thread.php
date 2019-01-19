<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id'];

    public function path()
    {
        return "/threads/{$this->category->name}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);

        return back();
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
