<?php

namespace App;

use App\Favorite;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['body', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        if (!$this->isFavoritedByCurrentUser()) {
            $this->favorites()->create([
                'user_id' => auth()->user()->id,
            ]);
        }
    }

    public function unfavorite()
    {
        $this->favorites()->where(['user_id' => auth()->user()->id])->delete();
    }

    public function isFavoritedByCurrentUser()
    {
        return auth()->check() && $this->favorites()->where(['user_id' => auth()->user()->id])->exists();
    }
}
