<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class AdminParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('dashboard.participants.index', [
            'participants' => $participants
        ]);
    }

    public function create()
    {
        return view('dashboard.participants.create');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return back()->with('message', 'تم حذف المشارك من القرعة بنجاح')->with('type', 'success');
    }
}
