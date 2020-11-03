<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$BASE_YEAR = 2020;
        //$week = (now()->year - $BASE_YEAR + 1) * now()->weekOfYear;

        $competitions = Competition::query();
        if (request('day')) {
            $competitions = $competitions->where('day', request('day'));
        }

        if (request('type')) {
            if (request('type') == 'free') {
                $competitions = $competitions->where('discount_percentage', 100);
            }
            else {
                $competitions = $competitions->where('discount_percentage', '<', 100);
            }
        }

        $competitions = $competitions->where('finish_at', '>', now()->subDay())->where(function($query) {
            $query->whereNotNull('winner_id')
                ->orWhere('status', 'active');
        })->orderBy('day')->latest()->get();
        return view('home', [
            'competitions' => $competitions
        ]);
    }
}
