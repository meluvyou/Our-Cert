<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\RequestCert;
class CertController extends Controller
{
    public function index()
    {
        $appSettings = [
            'barangay' => 'Guinacot',
            'province' => 'Cebu',
            'city' => 'Danao City',
        ];

        return Inertia::render('CertRequest/Index', [
            'appSettings' => $appSettings,
        ]);
    }

    public function store(Request $request){
 

        $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|email|max:25',
            'purok' => 'required|string|max:15',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'contact_number' => 'required|digits_between:10,11',
            'request_type' => 'required|integer',
            'date_of_claim' => 'required|date_format:Y-m-d',
            'months_years_in_brgy'  => 'required|string|max:6',
            'request_purpose' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:20',
            'suffix' => 'nullable|string|max:5',
            'barangay' => 'required|string|max:20',
            'city' => 'required|string|max:20',
            'province' => 'required|string|max:20',
            'civilstatus' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $requestCert = new RequestCert();
        $requestCert->first_name = $request->input('first_name');
        $requestCert->middle_name = $request->input('middle_name');
        $requestCert->last_name = $request->input('last_name');
        $requestCert->suffix = $request->input('suffix');
        $requestCert->email = $request->input('email');
        $requestCert->purok = $request->input('purok');
        $requestCert->barangay = $request->input('barangay');
        $requestCert->city = $request->input('city');
        $requestCert->province = $request->input('province');
        $requestCert->date_of_birth = $request->input('date_of_birth');
        $requestCert->contact_number = $request->input('contact_number');
        $requestCert->request_type = $request->input('request_type');
        $requestCert->civilstatus = $request->input('civilstatus') ?? 0; // Default to 0 if not provided
        $requestCert->status = $request->input('status') ?? 0; // Default to 0 if not provided
        $requestCert->request_purpose = $request->input('request_purpose');
        $requestCert->date_of_claim = $request->input('date_of_claim');
        $requestCert->months_years_in_brgy = $request->input('months_years_in_brgy'); 
        // Save the request to the database
        $requestCert->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Certificate request submitted successfully.',
        ]);
    }
}
