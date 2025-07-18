<?php

namespace Database\Seeders;

use App\Models\reseau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class socialSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        reseau::insert([
            ['libelle' => 'WhatsApp'],
            ['libelle' => 'Facebook'],
            ['libelle' => 'Instagram'],
            ['libelle' => 'TikTok'],
            ['libelle' => 'LinkedIn'],
            ['libelle' => 'Snapchat'],
            ['libelle' => 'X (Twitter)'],
        ]);
    }
}
