<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('sale_date', 'desc')->paginate(15);
        return Inertia::render('Sales', [
            'sales' => $sales,
        ]);
    }

    public function create()
    {
        return Inertia::render('SalesCreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sale_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Sale::create($data);

        return redirect()->route('sales');
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return Inertia::render('SalesEdit', [
            'sale' => $sale,
        ]);
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $data = $request->validate([
            'sale_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $sale->update($data);

        return redirect()->route('sales');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales');
    }
}
