<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RequestCert;
use App\Models\Sale;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 1) {
            return redirect()->route('CertRequest');
        }

        $totalClaims = RequestCert::where('status', 1)->count();
        $pendingRequests = RequestCert::where('status', 0)->count();
        $totalAdmins = User::where('role', 2)->count();

        $totalSalesCount = Sale::count();
        $totalSalesAmount = (float) Sale::sum('amount');
        $pendingSales = Sale::where('status', 'pending')->count();
        $completedSales = Sale::where('status', 'completed')->count();
        $averageOrderValue = $totalSalesCount > 0 ? round($totalSalesAmount / $totalSalesCount, 2) : 0;

        $monthlySales = Sale::selectRaw('DATE_FORMAT(sale_date, "%b") as label, SUM(amount) as total')
            ->groupByRaw('DATE_FORMAT(sale_date, "%Y-%m")')
            ->orderByRaw('MIN(sale_date)')
            ->limit(6)
            ->get()
            ->map(fn ($item) => [
                'label' => $item->label,
                'total' => (float) $item->total,
            ])
            ->toArray();

        $recentSales = Sale::orderByDesc('sale_date')
            ->take(5)
            ->get()
            ->map(fn ($sale) => [
                'id' => $sale->id,
                'sale_date' => $sale->sale_date,
                'amount' => (float) $sale->amount,
                'status' => $sale->status,
                'notes' => $sale->notes,
            ])
            ->toArray();

        return Inertia::render('Dashboard', [
            'totalClaims' => $totalClaims,
            'pendingRequests' => $pendingRequests,
            'totalAdmins' => $totalAdmins,
            'totalSalesCount' => $totalSalesCount,
            'totalSalesAmount' => $totalSalesAmount,
            'pendingSales' => $pendingSales,
            'completedSales' => $completedSales,
            'averageOrderValue' => $averageOrderValue,
            'recentSales' => $recentSales,
            'monthlySales' => $monthlySales,
        ]);
    }
}