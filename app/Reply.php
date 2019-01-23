<?php

namespace App;

use App\Interfaces\FeedPrintable;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model implements FeedPrintable
{
    use Favoritable, RecordsActivity;

    protected $fillable = ['body', 'user_id'];
    protected $dates    = ['created_at', 'updated_at'];

    protected $with = ['user', 'favorites', 'thread'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    function print() {
        echo "'{$this->body}' in thread <a href='{$this->thread->path()}'>{$this->thread->title}</a>";
    }
}
