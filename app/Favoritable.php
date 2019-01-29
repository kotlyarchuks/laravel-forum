<?php

namespace App;

trait Favoritable
{
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
        return auth()->check() && $this->favorites->where('user_id', auth()->user()->id)->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavoritedByCurrentUser();
    }
}
