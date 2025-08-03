<?php

namespace App\Http\Controllers;

use App\Models\CodePromo;
use Illuminate\Http\Request;

class CodePromoController extends Controller
{
    public function index()
    {
        $codes = CodePromo::latest()->get();
        return view('Dashborad.Ticket.CodePromo', compact('codes'));
    }

    public function create()
    {
        return view('admin.codes-promos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:code_promos,code',
            'reduction' => 'required|integer|min:1|max:100',
            'expiration' => 'nullable|date|after:today',
            'actif' => 'boolean'
        ]);

        CodePromo::create([
            'code' => strtoupper($request->code),
            'reduction' => $request->reduction,
            'expiration' => $request->expiration,
            'actif' => $request->has('actif')
        ]);

        return redirect()->route('codes-promos.index')->with('success', 'Code promo ajouté avec succès.');
    }

    public function destroy(CodePromo $codePromo)
    {
        $codePromo->delete();
        return redirect()->route('codes-promos.index')->with('success', 'Code promo supprimé.');
    }
}