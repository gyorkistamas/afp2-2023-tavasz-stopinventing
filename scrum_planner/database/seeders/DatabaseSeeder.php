<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'full_name' => 'Admin user',
            'email' => 'adminuser@justacompany.com',
            'password' => Hash::make('password'),
            'privilage' => 2,
            'picture' => '/profile_pic_sample.png',
            'status' => 0
        ]);

        User::create([
            'full_name' => 'Scrum Master',
            'email' => 'scrummaster@justacompany.com',
            'password' => Hash::make('password'),
            'privilage' => 1,
            'picture' => '/profile_pic_sample.png',
            'status' => 0
        ]);

        User::create([
            'full_name' => 'Simple user',
            'email' => 'justauser@justacompany.com',
            'password' => Hash::make('password'),
            'privilage' => 0,
            'picture' => '/profile_pic_sample.png',
            'status' => 0
        ]);
    }
}
