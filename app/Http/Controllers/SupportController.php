<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // Vous le créerez à l'étape suivante

class SupportController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        $userTheme = Auth::user()->theme ?? 'dark';

        return view('Dashboard_utilisateur.soutien', compact('faqs', 'userTheme'));
    }

    public function submitContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Option 1: Envoyer un e-mail
        Mail::to('nifenevra@gmail.com')->send(new ContactFormMail($validatedData));

        // Option 2: Stocker le message dans la base de données (nécessite une nouvelle table)
        // \App\Models\ContactMessage::create($validatedData);

        return back()->with('soutien', 'Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
    }
}