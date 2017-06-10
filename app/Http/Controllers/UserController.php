<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function interactions()
    {
        $interactions = \Auth::user()->interactions()->paginate(10);

        return view('posts.interactions', compact('interactions'));
    }
}
