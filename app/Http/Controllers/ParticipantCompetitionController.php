<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Participant;
use App\WhatsappPhone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParticipantCompetitionController extends Controller
{
    public function store(Competition $competition)
    {
        request()->validate([
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'phone_country' => ['required', Rule::in(['966', '967'])],
            'whatsapp_phone' => ['required', 'regex:/^\+[0-9]+$/']
        ], [
            'phone.regex' => 'الرجاء إدخال رقم جوال سعودي أو يمني صحيح',
            'phone.required' => 'رقم الجوال إجباري',
            'phone_country.required' => 'اختيار الدولة إجباري',
            'whatsapp_phone.required' => 'رقم الواتساب إجباري',
            'whatsapp_phone.regex' => 'الرجاء إدخال رقم واتساب صحيح'
        ]);

        $duplicate_phones = Competition::where('status', 'active')->get()->map->participants->flatten()->where('phone', request('phone'));
        if (count($duplicate_phones)) {
            return redirect()->route('home')->with('message', 'رقم الجوال هذا مسجل في القرعة بالفعل')->with('type', 'danger');
        }


        $participant = new Participant();
        $participant->phone = request('phone_country') . request('phone');
        $participant->competition_id = $competition->id;

        $participant->save();

        $whatsapp_phone = new WhatsappPhone();
        $whatsapp_phone->phone = request('whatsapp_phone');
        $whatsapp_phone->text = $competition->sms_text;
        $whatsapp_phone->save();

        // Send sms
        //sendSMS(request('phone_country'), $participant->phone, $competition->sms_text);

        return redirect()->route('home')->with('message', 'تم الاشتراك بنجاح')->with('type', 'success');
    }
}
