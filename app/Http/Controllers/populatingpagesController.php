<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulatingPagesController extends Controller
{
    public function index(Request $request)
    {
        // Get the number of months from the request or default to 1
        $months = $request->input('months', 1);

        // Validate that 'months' is a positive integer
        if (!is_numeric($months) || $months < 1) {
            $months = 1; // Default to 1 month if the input is invalid
        }

        // Generate posts for Username1 only (assuming 30 days per month)
        $posts = [];
        for ($i = 1; $i <= $months * 30; $i++) {
            $posts[] = [
                'Username' => 'Username1', // Fixed to Username1
                'date' => now()->subDays($i)->toDateString(),
                'content' => 'This is post number ' . $i . '. hotdooooooooog',
            ];
        }

        // Return the view with the posts
        return view('dashboard', compact('posts', 'months'));
    }
}
