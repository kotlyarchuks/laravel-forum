<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['event_type', 'user_id'];

    public function subject()
    {
        return $this->belongsTo($this->subject_type);
    }
}
