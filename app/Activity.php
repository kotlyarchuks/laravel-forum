<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['event_type', 'user_id'];

    public function subject()
    {
        return $this->morphTo();
    }

    public static function feed($user)
    {
        return $user->activities()->latest()->with('subject.favorited')->get()->groupBy(function ($item) {
            return $item->created_at->format('d-m-Y');
        });

    }
}
