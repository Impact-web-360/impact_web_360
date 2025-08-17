<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Evenement;
use App\Models\Article;
use App\Models\Sponsor;
use App\Models\Intervenant;
use App\Models\Formation; // Ajoutez ce modèle si vous ne l'avez pas
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques Générales
        $totalUsers = User::count();
        $totalEvenements = Evenement::count();
        $totalArticles = Article::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $totalSponsors = Sponsor::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $totalIntervenants = Intervenant::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $totalFormations = Formation::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        // Données pour le tableau des utilisateurs
        $recentUsers = User::latest()->take(8)->get();

        // Données pour le graphique des rôles
        $adminCount = User::where('type', 'admin')->count();
        $participantCount = User::where('type', 'participant')->count();
        $intervenantCount = User::where('type', 'intervenant')->count();

        // Données pour le graphique des utilisateurs par mois
        $usersByMonth = User::select(DB::raw('count(*) as count'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        $labels = [];
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create(null, $i, 1)->translatedFormat('M');
            $labels[] = $monthName;
            $count = 0;
            foreach ($usersByMonth as $monthData) {
                if ($monthData->month == $i) {
                    $count = $monthData->count;
                    break;
                }
            }
            $data[] = $count;
        }

        return view('Dashboard.index', compact(
            'totalUsers',
            'totalEvenements',
            'totalArticles',
            'totalSponsors',
            'totalIntervenants',
            'totalFormations',
            'recentUsers',
            'adminCount',
            'participantCount',
            'intervenantCount',
            'labels',
            'data'
        ));
    }
    public function destroy(User $user)
    {
        // Ne permet pas la suppression de l'utilisateur administrateur
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer un administrateur.');
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Utilisateur supprimé avec succès.');
}
}