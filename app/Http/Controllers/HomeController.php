<?php

namespace App\Http\Controllers;

use App\Response;
use App\Result;
use App\Test;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'categories' => Test::all()->groupBy('category_id'),
            'questions_answered' => Response::count(),
            'tests_taken' => Result::count(),
        ]);
    }
}
