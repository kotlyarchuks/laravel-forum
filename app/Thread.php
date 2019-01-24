<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use RecordsActivity;

    protected $fillable = ['title', 'body', 'user_id', 'category_id'];

    protected $with = ['user', 'category'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('replies_count', function ($builder) {
            $builder->withCount('replies');
        });

        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });
    }

    public function path()
    {
        return "/threads/{$this->category->name}/{$this->id}";
    }

    public function replies()
    {
        return $this->hasMany('App\Reply')
            ->withCount('favorites')
            ->with('user');
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
