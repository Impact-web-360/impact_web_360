<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashedPassword = bcrypt('admin123');
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Impact',
            'ville' => 'Paris',
            'description' => 'Administrateur du site Impact Web 360',
            'image' => 'admin.jpg',
            'pays' => 'France',
            'type' => 'admin',
            'telephone' => '+33123456789',
            'theme' => 'light',
            'biographie' => 'Passionné par le développement web et les nouvelles technologies.',
            'email' => 'admin360@gmail.com',
            'password' => $hashedPassword,
        ]);
    }
}
