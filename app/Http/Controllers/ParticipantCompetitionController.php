<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantCompetitionController extends Controller
{
    public function store(Competition $competition)
    {
        request()->validate([
            'phone' => ['required', 'string', 'regex:/^\+(966|967)[0-9]+$/'],
        ], [
            'phone.regex' => 'الرجاء إدخال رقم جوال سعودي أو يمني صحيح',
            'phone.required' => 'رقم الجوال إجباري'
        ]);

        $duplicate_phones = Competition::where('status', 'active')->get()->map->participants->flatten()->where('phone', request('phone'));
        if (count($duplicate_phones)) {
            return redirect()->route('home')->with('message', 'رقم الجوال هذا مسجل في القرعة بالفعل')->with('type', 'danger');
        }


        $participant = new Participant();
        $participant->phone = request('phone');
        $participant->competition_id = $competition->id;

        $participant->save();

        return redirect()->route('home')->with('message', 'تم الاشتراك بنجاح')->with('type', 'success');
    }
}
