<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Result;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        Cache::add('questionsAnswered', Result::sum('questions_answered'), 60);
        Cache::add('testsTaken', Result::count(), 60);

        return view('home', [
            'partners' => Partner::limit(8)->get(),
            'questionsAnswered' => cache('questionsAnswered'),
            'testsTaken' => cache('testsTaken'),
        ]);
    }
}
