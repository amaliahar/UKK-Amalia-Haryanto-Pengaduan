<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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

        \App\Models\User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin098'),
        ]);

       \App\Models\User::create([
            'username' => 'masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => bcrypt('masyarakat098'),
       ]);

       \App\Models\User::create([
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas098'),
       ]);
    }
}
