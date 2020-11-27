<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function confirm()
    {
        return view('dashboard.reservations.confirm');
    }
    public function cancel()
    {
        return view('dashboard.reservations.cancel');
    }
    public function postpone()
    {
        return view('dashboard.reservations.postpone');
    }
}
