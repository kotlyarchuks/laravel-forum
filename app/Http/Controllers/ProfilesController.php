<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        // dd($user->activities->toArray());

        return view('profiles.show', [
            'profileUser' => $user,
            // 'threads'     => $user->threads,
            'activities'  => $user->activities,
        ]);
    }
}
