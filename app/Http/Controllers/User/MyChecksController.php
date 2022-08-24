<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Check;
use App\Models\User;
use Illuminate\Http\Request;

class MyChecksController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $checks = $user->checks()->paginate(10);

        return view('user.checks', compact('checks'));
    }
}
