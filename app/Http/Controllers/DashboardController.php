<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RequestCert; // or your actual request model
use App\Models\ReleasedCert; // or your actual released cert model
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        // Fetch latest released certificates (adjust as needed)
        $releasedCerts = ReleasedCert::latest()->take(10)->get();

        // Example: Get counts from your tables
        $totalRequests = RequestCert::count();
        $pendingRequests = RequestCert::where('status', 'pending')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        return Inertia::render('Dashboard', [
            'releasedCerts'=> $releasedCerts,
            'totalRequests' => $totalRequests,
            'pendingRequests' => $pendingRequests,
            'totalAdmins' => $totalAdmins,
        ]);
    }
    
}