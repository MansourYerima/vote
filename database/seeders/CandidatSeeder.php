<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\Poste;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidatSeeder extends Seeder
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
            'Chargé de Communication',
        ];
        
        $candidates = [
                [
                    'name' => 'Nabila',
                    'programme' => 'Construisons un BDE à notre image.',
                    'photo' => '/photos/nabila.jpg',
                    'votes_count' => 0,
                    "postes" => ["Président",],
                ],
                [
                    'name' => 'Patrik',
                    'programme' => 'Ensemble faisons bouger le campus.',
                    'photo' => '/photos/patrick.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Président",],
                ],
                [
                    'name' => 'Fahouzia',
                    'programme' => 'BDE pour tous',
                    'photo' => '/photos/fahouzia.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Président",],
                ],
                [
                    'name' => 'Daniel',
                    'programme' => 'Trust the process',
                    'photo' => '/photos/daniel.jpg',
                    'votes_count' => 0,
                    "postes" => ["Président",],
                ],
                [
                    'name' => 'Essoronda',
                    'programme' => 'Tu comptes',
                    'photo' => '/photos/essoronda.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Président",],
                ],
                [
                    'name' => 'Islam',
                    'programme' => '',
                    'photo' => '/photos/islam.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Vice-Président",],
                ],
                [
                    'name' => 'Youssif',
                    'programme' => '',
                    'photo' => '/photos/youssif.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Vice-Président",],
                ],
                [
                    'name' => 'Sossoukpe Komi christophe',
                    'programme' => '',
                    'photo' => '/photos/christophe.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Vice-Président", "Chargé de Communication", "Chargé des Activités"],
                ],
                [
                    'name' => 'Gisele',
                    'programme' => '',
                    'photo' => '/photos/gisele.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Secrétaire",],
                ],
                [
                    'name' => 'Alassani',
                    'programme' => '',
                    'photo' => '/photos/alassani.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Secrétaire",],
                ],
                [
                    'name' => 'Soka',
                    'programme' => '',
                    'photo' => '/photos/soka.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Secrétaire",],
                ],
                [
                    'name' => 'Farida',
                    'programme' => '',
                    'photo' => '/photos/farida.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Trésorier",],
                ],
                [
                    'name' => 'Grace',
                    'programme' => '',
                    'photo' => '/photos/grace.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Trésorier",],
                ],
                [
                    'name' => 'Socrate',
                    'programme' => '',
                    'photo' => '/photos/socrate.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé des Activités",],
                ],
                [
                    'name' => 'Mansour',
                    'programme' => '',
                    'photo' => '/photos/mansour.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Adom',
                    'programme' => '',
                    'photo' => '/photos/adom.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Chakour',
                    'programme' => '',
                    'photo' => '/photos/chakour.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Alidou',
                    'programme' => '',
                    'photo' => '/photos/alidou.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Florian',
                    'programme' => '',
                    'photo' => '/photos/florian.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Arouna',
                    'programme' => '',
                    'photo' => '/photos/arouna.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication",],
                ],
                [
                    'name' => 'Rachad',
                    'programme' => '',
                    'photo' => '/photos/rachad.jpeg',
                    'votes_count' => 0,
                    "postes" => ["Chargé de Communication", "Trésorier"],
                ],
            ];
        foreach ($candidates as $candidate_data) {
           $candidate = Candidate::create([
                'name' => $candidate_data['name'],
                'programme' => $candidate_data['programme'],
                'photo' => $candidate_data['photo'],
           ]);
           $postes = Poste::whereIn('name', $candidate_data['postes'])->get();
           $candidate->postes()->attach($postes);
        }
    }
}
