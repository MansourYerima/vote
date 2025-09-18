<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poste;

class PostesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postes = [
            'Président',
            'Vice-Président',
            'Secrétaire',
            'Trésorier',
            'Chargé des Activités',
            'Chargé de la Communication',
            'Chargés du ménage',
        ];

        foreach ($postes as $poste) {
            Poste::firstOrCreate(['name' => $poste]);
        }
    }
}
