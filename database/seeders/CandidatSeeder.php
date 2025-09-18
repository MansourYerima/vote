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

        $candidates =
        [
            [
            'name' => 'SOSSOUKPE Christophe',
            'programme' => '....',
            'photo' => '/photos/christophe.jpg',
            'votes_count' => 0,
            'postes' => ['Président'],
        ],
        [
            'name' => 'ATTA Gisèle',
            'programme' => '....',
            'photo' => '/photos/gisele.jpg',
            'votes_count' => 0,
            'postes' => ['Président'],
        ],
        [
            'name' => 'BOKOPOLO Yahliou',
            'programme' => '....',
            'photo' => '/photos/yahliou.jpg',
            'votes_count' => 0,
            'postes' => ['Vice-Président'],
        ],
        [
            'name' => 'AGOUDA Abdel',
            'programme' => '....',
            'photo' => '/photos/abdel.jpg',
            'votes_count' => 0,
            'postes' => ['Vice-Président'],
        ],
        [
            'name' => 'IDRISSOU Fawzane',
            'programme' => '....',
            'photo' => '/photos/fawzane.jpg',
            'votes_count' => 0,
            'postes' => ['Vice-Président'],
        ],
        [
            'name' => 'BILANTE Franck',
            'programme' => '....',
            'photo' => '/photos/franck.jpg',
            'votes_count' => 0,
            'postes' => ['Vice-Président'],
        ],
        [
            'name' => 'KAMANG Paterne',
            'programme' => '....',
            'photo' => '/photos/paterne.jpg',
            'votes_count' => 0,
            'postes' => ['Vice-Président'],
        ],
        [
            'name' => 'TCHALLATALAKI Stéphanie',
            'programme' => '....',
            'photo' => '/photos/stephanie.jpg',
            'votes_count' => 0,
            'postes' => ['Secrétaire'],
        ],
        [
            'name' => 'AMAGUINA Julie',
            'programme' => '....',
            'photo' => '/photos/julie.jpg',
            'votes_count' => 0,
            'postes' => ['Secrétaire'],
        ],
        [
            'name' => 'SABE Peniel',
            'programme' => '....',
            'photo' => '/photos/peniel.jpg',
            'votes_count' => 0,
            'postes' => ['Secrétaire'],
        ],
        [
            'name' => 'GOUTANDI Nabila',
            'programme' => '....',
            'photo' => '/photos/nabila.jpg',
            'votes_count' => 0,
            'postes' => ['Trésorier'],
        ],
        [
            'name' => 'TCHADJIRO Rahmate',
            'programme' => '....',
            'photo' => '/photos/rahmate.jpg',
            'votes_count' => 0,
            'postes' => ['Trésorier'],
        ],
        [
            'name' => 'ABDOU Faouzia',
            'programme' => '....',
            'photo' => '/photos/faouzia.jpg',
            'votes_count' => 0,
            'postes' => ['Trésorier', 'Chargés du ménage'],
        ],
        [
            'name' => 'BAH-SONGHAI Yassidou',
            'programme' => '....',
            'photo' => '/photos/yassidou.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication'],
        ],
        [
            'name' => 'FIAKEY Fernando',
            'programme' => '....',
            'photo' => '/photos/fernando.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication'],
        ],
        [
            'name' => 'MAKAYABA Florian',
            'programme' => '....',
            'photo' => '/photos/florian.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication'],
        ],
        [
            'name' => 'ABDOULAYE Aliya',
            'programme' => '....',
            'photo' => '/photos/aliya.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication'],
        ],
        [
            'name' => 'AMEZO Grace',
            'programme' => '....',
            'photo' => '/photos/grace.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication', 'Chargés du ménage'],
        ],
        [
            'name' => 'KONDI Ganietou',
            'programme' => '....',
            'photo' => '/photos/ganietou.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé de la Communication'],
        ],
        [
            'name' => 'NONDOOU Michael',
            'programme' => '....',
            'photo' => '/photos/michael.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé des Activités'],
        ],
        [
            'name' => 'AGAO Rois',
            'programme' => '....',
            'photo' => '/photos/rois.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé des Activités'],
        ],
        [
            'name' => 'AKPARO Olivier',
            'programme' => '....',
            'photo' => '/photos/olivier.jpg',
            'votes_count' => 0,
            'postes' => ['Chargé des Activités'],
        ],
        [
            'name' => 'NAZEGA Youssif',
            'programme' => '....',
            'photo' => '/photos/youssif.jpg',
            'votes_count' => 0,
            'postes' => ['Chargés du ménage'],
        ],
        [
            'name' => 'AROUNA Ramdane',
            'programme' => '....',
            'photo' => '/photos/ramdane.jpg',
            'votes_count' => 0,
            'postes' => ['Chargés du ménage'],
        ],
        [
            'name' => 'SEIBOU',
            'programme' => '....',
            'photo' => '/photos/seibou.jpg',
            'votes_count' => 0,
            'postes' => ['Chargés du ménage'],
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
