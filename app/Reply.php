<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;

    protected $fillable = ['body', 'user_id'];

    protected $with = ['user', 'favorites', 'thread'];
    protected $appends = ['favoritesCount', 'isFavorited'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($reply) {
            $reply->favorited->each->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function favorited()
    {
        return $this->morphMany('App\Favorite', 'favorited');
    }
}
