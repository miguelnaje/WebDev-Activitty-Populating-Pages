<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulatingPagesController extends Controller
{
    public function index(Request $request)
    {
        $startMonth = $request->input('start_month');
        $endMonth = $request->input('end_month');
        $posts = [];

        // Define the month names array
        $monthNames = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        if ($startMonth && $endMonth) {
            // Validate month range
            if (!is_numeric($startMonth) || $startMonth < 1 || $startMonth > 12) {
                $startMonth = 1;
            }

            if (!is_numeric($endMonth) || $endMonth < 1 || $endMonth > 12) {
                $endMonth = 12;
            }

            // Ensure startMonth <= endMonth
            if ($startMonth > $endMonth) {
                list($startMonth, $endMonth) = [$endMonth, $startMonth];
            }

            // Generate posts for the specified range of months using month names
            for ($month = $startMonth; $month <= $endMonth; $month++) {
                $posts[] = [
                    'Username' => $monthNames[$month],  // Map month number to month name
                    'month' => $month,                   // Store month number (for future use)
                    'content' => "This is the month: " . $monthNames[$month],  // Use month name in content
                ];
            }
        }

        return view('dashboard', compact('posts', 'startMonth', 'endMonth'));
    }
}
