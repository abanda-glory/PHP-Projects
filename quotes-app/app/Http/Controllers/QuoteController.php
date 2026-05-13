<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $quote = Quote::inRandomOrder()->first();

        if (!$quote) {
            $quote = (object)[
                'content' => 'No quotes available yet.',
                'author' => 'System'
            ];
        }

        return view('welcome', compact('quote'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => [
                'required',
                'string',
                'min:5',
                'regex:/[A-Za-z]/'
            ],

            'author' => [
                'nullable',
                'string',
                'max:255'
            ]
        ], [
            'content.regex' => 'The quote must contain letters.',
            'content.min' => 'The quote must be at least 5 characters long.'
        ]);

        Quote::create([
            'content' => htmlspecialchars(trim($request->input('content'))),
            'author' => htmlspecialchars(trim($request->input('author'))),
        ]);

        return redirect('/')->with('success', 'Quote added successfully!');
    }
}
