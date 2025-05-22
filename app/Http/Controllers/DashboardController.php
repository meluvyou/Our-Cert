<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RequestCert;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        // Example: Get counts from your tables
        $totalClaim = RequestCert::where('status',  1)->count();
        $pendingRequests = RequestCert::where('status', 0)->count();
        $totalAdmins = User::where('role', 2)->count();

        return Inertia::render('Dashboard', [
            'totalClaims'=> $totalClaim,
            'pendingRequests' => $pendingRequests,
            'totalAdmins' => $totalAdmins,
        ]);
    }
    
}