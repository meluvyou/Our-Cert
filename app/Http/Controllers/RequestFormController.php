<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestFormController extends Controller
{
    //

    public function index()
    {
        return Inertia::render('RequestForm/Index');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store the request data in the database or perform any other action

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request submitted successfully!');
    }
}
