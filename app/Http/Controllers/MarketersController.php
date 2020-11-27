<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketersController extends Controller
{
    public function info()
    {
        return view('dashboard.marketers.info');
    }
    public function services()
    {
        return view('dashboard.marketers.services');
    }
    public function archive()
    {
        return view('dashboard.marketers.archive');
    }
    public function charge()
    {
        return view('dashboard.marketers.charge');
    }
    public function settings()
    {
        return view('dashboard.marketers.settings');
    }
}
