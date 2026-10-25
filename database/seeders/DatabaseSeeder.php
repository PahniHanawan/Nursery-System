<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Nursery Manager & Admissions Head admin account (Persona 2)
        User::firstOrCreate(
            ['email' => 'admin@littlesprouts.test'],
            [
                'name' => 'Sarah Jenkins',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            FeeTierSeeder::class,
            PageContentSeeder::class,
            GalleryImageSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
