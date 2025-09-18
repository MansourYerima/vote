<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'socrate',
                'email' => 'socrate@vote.com',
                'email_verified_at' => now(),
                'password' => 'password1',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'fatiha',
                'email' => 'fatiha@vote.com',
                'email_verified_at' => now(),
                'password' => 'password2',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'christian',
                'email' => 'christian@example.com',
                'email_verified_at' => now(),
                'password' => 'password3',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'hannatou',
                'email' => 'hannatou@vote.com',
                'email_verified_at' => now(),
                'password' => 'password4',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'yahliou',
                'email' => 'yahliou@vote.com',
                'email_verified_at' => now(),
                'password' => 'password5',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'aiman',
                'email' => 'aiman@vote.com',
                'email_verified_at' => now(),
                'password' => 'password6',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'aliya',
                'email' => 'aliya@vote.com',
                'email_verified_at' => now(),
                'password' => 'password7',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'chakour',
                'email' => 'chakour@vote.com',
                'email_verified_at' => now(),
                'password' => 'password8',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'nabila',
                'email' => 'nabila@vote.com',
                'email_verified_at' => now(),
                'password' => 'password9',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'michael',
                'email' => 'michael@vote.com',
                'email_verified_at' => now(),
                'password' => 'password10',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ramdane',
                'email' => 'ramdane@vote.com',
                'email_verified_at' => now(),
                'password' => 'password11',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'steph',
                'email' => 'steph@vote.com',
                'email_verified_at' => now(),
                'password' => 'password12',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'youssif',
                'email' => 'youssif@vote.com',
                'email_verified_at' => now(),
                'password' => 'password13',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'rois',
                'email' => 'rois@vote.com',
                'email_verified_at' => now(),
                'password' => 'password14',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'faouzia',
                'email' => 'faouzia@vote.com',
                'email_verified_at' => now(),
                'password' => 'password15',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'gisele',
                'email' => 'gisele@vote.com',
                'email_verified_at' => now(),
                'password' => 'password16',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'rahmate',
                'email' => 'rahmate@vote.com',
                'email_verified_at' => now(),
                'password' => 'password16',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'grace',
                'email' => 'grace@vote.com',
                'email_verified_at' => now(),
                'password' => 'password17',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'godwin',
                'email' => 'godwin@vote.com',
                'email_verified_at' => now(),
                'password' => 'password18',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'donne',
                'email' => 'donne@vote.com',
                'email_verified_at' => now(),
                'password' => 'password19',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'abdel',
                'email' => 'abdel@vote.com',
                'email_verified_at' => now(),
                'password' => 'password16',
                'remember_token' => bin2hex(random_bytes(5)),
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];


        foreach ($users as &$user) {
            $user['password'] = Hash::make($user['password']);
        }

        DB::table('users')->insert($users);
    }
}
