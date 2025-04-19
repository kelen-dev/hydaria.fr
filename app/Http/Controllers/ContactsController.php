<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy as Flashy;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function create()
    {
        return view('p/contact.index');
    }

    public function store(ContactRequest $request)
    {
        $mailable = new ContactMessageCreated($request->name, $request->email, $request->message);
        Mail::to(config('kelens.admin_support_email'))->send($mailable);

        Flashy::message('Nous vous répondrons dans les plus brefs délais !');

        return redirect()->route('home');
    }
}
