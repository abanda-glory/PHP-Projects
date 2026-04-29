<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quote::create([
            'content' => 'Success is the sum of sum of small efforts repeated daily.',
            'author' => 'Robert Collier',
        ]);

        Quote::create([
            'content' => 'Do not wait for an opportunity. Create it.',
            'author' => null,
        ]);

        Quote::create([
            'content' => 'Push yourself, because no one else is going to do it for you.',
            'author' => null,
        ]);
    }
}
