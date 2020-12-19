<?php

namespace App\Http\Controllers;

use App\WhatsappPhone;
use Illuminate\Http\Request;

class AdminWhatsappPhonesController extends Controller
{
    public function index()
    {
        $whatsapp_phones = WhatsappPhone::all();
        return view('dashboard.whatsapp.index', [
            'whatsapp_phones' => $whatsapp_phones
        ]);
    }

    public function destroy(WhatsappPhone $whatsapp_phone)
    {
        $whatsapp_phone->delete();
        return back()->with('message', 'تم الحذف بنجاح')->with('type', 'success');
    }
}
