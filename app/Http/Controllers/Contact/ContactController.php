<?php

namespace App\Http\Controllers\Contact;
use App\Http\Controllers\Controller;
use Mail;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactForm.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nadawca' => 'required',
            'email' => 'required',
            'wiadomosc' => 'required',
        ]);
        Mail::send('contactForm.contact-form', [
            'nadawca' => $request->nadawca,
            'wiadomosc' => $request->wiadomosc,
            'email' => $request->email,
        ], function ($mail) use($request) {
            $adres= $request->email;
            $mail->from($adres);
            $temat='Nowa wiadomość z formularza kontaktowego Laravel CMS';
            $odbiorca = 'tester2@baj-soft.pl';
            $mail->to($odbiorca)->subject($temat);
        });

        return redirect()->back()->with('flash_message', 'Wiadomość wysłana pomyślnie.');
    }
}
