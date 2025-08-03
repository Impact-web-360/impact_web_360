<?php

namespace App\Http\Controllers;
use App\Models\Sponsor;
use App\Models\Evenement;
use App\Models\User;
use App\Models\article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        $evenements = Evenement::all();
        $intervenants = User::where('type', 'intervenant')->get();

        return view('index', compact('sponsors', 'evenements','intervenants'));

    }

    public function sponsor()
    {
        $sponsors = Sponsor::all();
        $evenements = Evenement::all();
        $intervenants = User::where('type', 'intervenant')->get();

        return view('sponsor', compact('sponsors', 'evenements','intervenants'));
    }

    public function intervenant()
    {
        $sponsors = Sponsor::all();
        $evenements = Evenement::all();
        $intervenants = User::where('type', 'intervenant')->get();

        return view('intervenant', compact('sponsors', 'evenements','intervenants'));
    }

    public function evenement()
    {
        $sponsors = Sponsor::all();
        $evenements = Evenement::all();
        $intervenants = User::where('type', 'intervenant')->get();

        return view('evenement', compact('sponsors', 'evenements','intervenants'));
    }

    public function ticket()
    {
        $evenements = Evenement::all();

        return view('Dashboard.Ticket.CodePromo', compact('evenements'));
    }

    public function boutique()
    {
        $articles = article::all();
        return view('boutique', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
