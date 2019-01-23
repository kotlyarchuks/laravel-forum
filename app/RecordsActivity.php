<?php

namespace App;

trait RecordsActivity
{
    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) {
            return;
        }

        static::created(function ($thread) {
            $thread->addActivity('created');
        });

    }

    public function activities()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    public function addActivity($eventType)
    {
        return $this->activities()->create([
            'event_type' => $eventType,
            'user_id'    => auth()->user()->id,
        ]);
    }
}
