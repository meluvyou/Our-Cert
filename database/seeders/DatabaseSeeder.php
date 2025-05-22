<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::create([
            'name' => 'System Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('@admin101'),
            'status' => '1',
            'role' => '2',]);
    }
}
