<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin Afrehouse',
            'email' => 'altaf@gmail.com',
            'role' => 'admin',
        ]);


        $user = User::factory(10)->create();
        $listing = Listing::factory()->count(10)->create();

        Transaction::factory(10)
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => [
                        'user_id' => $user->random(),
                        'listing_id' => $listing->random(),
                    ]
                )
            )->create();
    }
}
