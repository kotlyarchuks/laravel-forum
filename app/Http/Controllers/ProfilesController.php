<?php

namespace App\Http\Controllers;

use App\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => $this->getActivity($user),
        ]);
    }

    protected function getActivity($user)
    {
        return $user->activities()->latest()->with('subject')->get()->groupBy(function ($item) {
            return $item->created_at->format('d-m-Y');
        });
    }
}
