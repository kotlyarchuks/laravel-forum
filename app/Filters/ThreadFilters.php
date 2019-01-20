<?php

namespace App\Filters;

use App\Filters\Filters;
use App\User;

class ThreadFilters extends Filters
{
    protected $filters = ['by', 'popularity'];

    public function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->query->where('user_id', $user->id);
    }

    public function popularity($value)
    {
        if (!$value == 1) {
            return $this->query;
        }

        return $this->query->orderBy('replies_count', 'desc');
    }
}
