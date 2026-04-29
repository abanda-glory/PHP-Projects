<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class QuoteController extends Controller
{
    public function index()
    {
        $quote = Quote::inRandomOrder()->first();
        return view('welcome', compact('quote'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Quote::create([
            'content' => htmlspecialchars(trim($request->input('content'))),
            'author' => htmlspecialchars(trim($request->input('author'))),
        ]);

        return redirect('/')->with('success', 'Quote added successfully!');
    }
}
