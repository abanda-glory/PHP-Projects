<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
    public function run(): void
    {
        $quotes = [
            [
                'content' => 'Well done is better than well said.',
                'author' => 'Benjamin Franklin'
            ],
            [
                'content' => 'Success is not final, failure is not fatal.',
                'author' => 'Winston Churchill'
            ],
            [
                'content' => 'Dream big and dare to fail.',
                'author' => 'Norman Vaughan'
            ],
            [
                'content' => 'Push yourself because no one else is going to do it for you.',
                'author' => 'Unknown'
            ],
            [
                'content' => 'Do something today that your future self will thank you for.',
                'author' => 'Unknown'
            ],
            [
                'content' => 'Small steps every day lead to big results.',
                'author' => 'Unknown'
            ],
            [
                'content' => 'Discipline is choosing between what you want now and what you want most.',
                'author' => 'Abraham Lincoln'
            ],
            [
                'content' => 'Your only limit is your mind.',
                'author' => 'Unknown'
            ]
        ];

        foreach ($quotes as $quote) {
            Quote::create($quote);
        }
    }
}
