<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use RecordsActivity;

    public function favorited()
    {
        return $this->morphTo();
    }

    protected $fillable = ['user_id'];
}
