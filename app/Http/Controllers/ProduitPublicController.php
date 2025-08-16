<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProduitPublicController extends Controller
{
    public function show($id)
{
    $produit = Article::findOrFail($id);
    $comments = Commentaire::where('produit_id', $id)->latest('date_publication')->get();
    $suggestions = Article::where('id', '!=', $id)->inRandomOrder()->limit(3)->get();

    // Ajout du code pour calculer le nombre d'articles dans le panier
    $total_items = 0;
    $panier = session('panier', []);
    foreach ($panier as $item) {
        $total_items += $item['quantite'];
    }

    // Passage de la variable $total_items à la vue
    return view('boutique_plus', compact('produit', 'comments', 'suggestions', 'total_items'));
}

    public function ajouterCommentaire(Request $request, $id)
    {
        $request->validate([
            'auteur' => 'required|string|max:255',
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'required|string',
        ]);

        Commentaire::create([
            'produit_id' => $id,
            'auteur' => $request->auteur,
            'note' => $request->note,
            'commentaire' => $request->commentaire,
            'date_publication' => now(),
        ]);

        return redirect()->route('boutique_plus', $id);
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email_newsletter' => 'required|email',
        ]);

        $email = $request->email_newsletter;

        if (!Newsletter::where('email', $email)->exists()) {
            Newsletter::create([
                'email' => $email,
                'date_inscription' => now(),
            ]);

            // Email de confirmation (optionnel)
            try {
                Mail::raw("Merci pour votre inscription à la newsletter d'Impact Web 360.", function ($message) use ($email) {
                    $message->to($email)->subject("Confirmation newsletter");
                });

                return back()->with('newsletter_success', 'Merci ! Un email vous a été envoyé.');
            } catch (\Exception $e) {
                return back()->with('newsletter_success', "Inscription réussie, mais erreur email : {$e->getMessage()}");
            }
        }

        return back()->with('newsletter_error', 'Cet email est déjà inscrit.');
    }
}

