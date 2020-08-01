<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        $otherUsers = User::where('id', '!=', $user->id)->orderByDesc('updated_at')->limit(5)->get();

        $results = $user->results
            ->sortBy(function ($result) {
                return $result->test->sort_order;
            })
            ->groupBy(function ($result) {
                return $result->test->category->name;
            });

        return view('users.show', [
            'otherUsers' => $otherUsers,
            'results' => $results,
            'user' => $user,
        ]);
    }
}
