<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Informatique', 'Design', 'Marketing', 'Business', 'La science', 'Le droit', 'Langue de travail'];

        foreach ($categories as $nom) {
            Categorie::create(['nom' => $nom]);
        }
    }
}
