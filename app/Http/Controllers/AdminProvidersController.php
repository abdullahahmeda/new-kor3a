<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProvidersController extends Controller
{
    public function create()
    {
        return view('dashboard.providers.create');
    }
}
