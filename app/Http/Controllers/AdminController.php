<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $total_participants = Participant::count();
        $total_competitions = Competition::count();
        return view('dashboard.index', [
            'total_participants' => $total_participants,
            'total_competitions' => $total_competitions
        ]);
    }

    public function admin()
    {
        $admin = User::find(1);
        return view('dashboard.admin', [
            'admin' => $admin
        ]);
    }

    public function update()
    {
        $attibutes = request()->validate([
            'name' => 'required',
            'email' => ['string', 'email', 'required'],
            'password' => ['string', 'required', 'confirmed']
        ]);
        
        $attibutes['password'] = bcrypt(request('password'));
        $admin = User::find(1);
        $admin->update($attibutes);

        return back()->with('message', 'تم تحديث البيانات')->with('type', 'success');
    }

}
