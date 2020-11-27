<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminMarketersController extends Controller
{
    public function create()
    {
        return view('dashboard.marketers.create');
    }
}
