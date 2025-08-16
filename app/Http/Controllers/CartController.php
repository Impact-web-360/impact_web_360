<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Assurez-vous d'avoir un modèle 'Article'

class CartController extends Controller
{
    /**
     * Affiche le contenu du panier.
     */
    // Fichier : app/Http/Controllers/CartController.php



    public function index()
{
    $panier = session()->get('panier', []);

    $sous_total = 0;
    $total_items = 0; // Ajout de cette variable
    foreach ($panier as $item) {
        $sous_total += $item['prix'] * $item['quantite'];
        $total_items += $item['quantite']; // Comptabilise le nombre total d'articles
    }
    $frais_de_port = 1000; 
    $taxes = $sous_total * 0.0; // 10% de taxes
    $total = $sous_total + $frais_de_port + $taxes;

    $message_whatsapp = "Bonjour, je souhaite passer une commande pour les articles suivants :\n\n";
    foreach ($panier as $item) {
        $message_whatsapp .= "- {$item['nom']} ({$item['quantite']} x " . number_format($item['prix'], 0, '', ' ') . " FCFA)\n";
    }

    $message_whatsapp .= "\n---\n";
    $message_whatsapp .= "Sous-total: " . number_format($sous_total, 0, '', ' ') . " FCFA\n";
    $message_whatsapp .= "Frais de port: " . number_format($frais_de_port, 0, '', ' ') . " FCFA\n";
    $message_whatsapp .= "Taxes: " . number_format($taxes, 0, '', ' ') . " FCFA\n";
    $message_whatsapp .= "Total de la commande: " . number_format($total, 0, '', ' ') . " FCFA\n";

    $whatsapp_url = 'https://wa.me/22969647090?text=' . urlencode($message_whatsapp);

    return view('panier', compact('panier', 'sous_total', 'frais_de_port', 'taxes', 'total','total_items', 'whatsapp_url'));
    
}


    /**
     * Ajoute un article au panier.
     */
    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:articles,id',
            'quantite' => 'required|integer|min:1'
        ]);

        $article = Article::find($request->id);
        $panier = session()->get('panier', []);
        $quantite = $request->quantite;

        if (isset($panier[$article->id])) {
            $panier[$article->id]['quantite'] += $quantite;
        } else {
            $panier[$article->id] = [
                "id" => $article->id,
                "nom" => $article->nom,
                "quantite" => $quantite,
                "prix" => $article->prix,
                "image" => asset($article->image), // Attention au chemin de l'image
                "taille" => $article->taille,
                "couleur" => $article->couleur,
            ];
        }

        session()->put('panier', $panier);

         $total_items = count(session()->get('panier', []));

        // Si la requête est une requête AJAX
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Article ajouté au panier avec succès !',
                'cart_count' => $total_items,
            ]);
        }

        // Sinon, redirection classique
        return redirect()->back()->with('success', 'Article ajouté au panier avec succès !');

    }

    /**
     * Met à jour la quantité d'un article dans le panier.
     */
    public function update(Request $request)
    {
        $panier = session()->get('panier');
        if (isset($panier[$request->id])) {
            if ($request->action == 'increase') {
                $panier[$request->id]['quantite']++;
            } elseif ($request->action == 'decrease' && $panier[$request->id]['quantite'] > 1) {
                $panier[$request->id]['quantite']--;
            }
            session()->put('panier', $panier);
        }
        return redirect()->back();
    }

    /**
     * Supprime un article du panier.
     */
    public function remove(Request $request)
    {
        $panier = session()->get('panier');
        if (isset($panier[$request->id])) {
            unset($panier[$request->id]);
            session()->put('panier', $panier);
        }
        return redirect()->back()->with('success', 'Article supprimé du panier.');
    }
}