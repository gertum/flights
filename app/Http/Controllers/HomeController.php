<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(): View
    {
        return view('home', [
            'test' => 'Mano Testas'
        ]);
    }
}
