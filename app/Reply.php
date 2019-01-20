<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;

    protected $fillable = ['body', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $with = ['user', 'favorites'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
