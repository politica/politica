<?php

namespace App\Http\Controllers;

use App\Result;

class ResultClaimsController extends Controller
{
    public function __invoke(Result $result)
    {
        if (! $result->user) {
            $result->user()->associate(user());
            $result->save();
        }

        return redirect()->route('results.show', ['result' => $result]);
    }
}
