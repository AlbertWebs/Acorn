<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure at least a couple of consultants exist
        $consultants = [
            [
                'name' => 'Consultant One',
                'email' => 'consultant1@example.com',
                'password' => Hash::make('password'),
                'role' => 'consultant',
            ],
            [
                'name' => 'Consultant Two',
                'email' => 'consultant2@example.com',
                'password' => Hash::make('password'),
                'role' => 'consultant',
            ],
        ];

        foreach ($consultants as $data) {
            User::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
