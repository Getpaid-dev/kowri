<?php 
namespace App\Http\Controllers;

use App\Models\Screenshot;

class ScreenshotController extends Controller
{
    public function index()
    {
        // Fetch all screenshots with their associated user data
        $screenshots = Screenshot::with('user')->latest()->get();

        // Return the view with screenshots
        return view('screenshots.index', compact('screenshots'));
    }
}
