<?php

namespace App\Http\Controllers;

use App\Models\CertRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
class CertRequestController extends Controller
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
    public function create()
{
    $appSettings = [
        'barangay' => 'Guinacot',
        'province' => 'Cebu',
        'city' => 'Danao City',
    ];
    return inertia('CertRequest/Edit', [
        'person' => null,
        'mode' => 'create',
        'userType' => 'user',
        'appSettings' => $appSettings, 
    ]);
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:25',
            'email' => 'required|email|max:25',
            'status' => 'required|string|max:20',
            'address' => 'required|string|max:25',
            'request_type' => 'required|string|max:25',
            'request_purpose'=> 'required|string|max:25',
            'purok' => 'required|string|max:25',
            'phone' => 'required|mimes:docx|max:25',

        ]);

        if ($request->input('id')) {
            // Update existing record
            $allrequest = CertRequest::findOrFail($request->input('id'));
            $allrequest->name = $request->input('name');
            $allrequest->email = $request->input('email');
            $allrequest->address = $request->input('address');
            $allrequest->request_type = $request->input('request_type');
            $allrequest->request_purpose = $request->input('request_purpose');
            $allrequest->purok = $request->input('purok');
            $allrequest->phone = $request->input('phone');
            $allrequest->status = $request->input('status');

            $allrequest->save();
            return response()->json([ 
                'success' => true,
                'message' => 'Data updated successfully.',
            ]);
        }else {
            // Create new record
            $requestCert = new CertRequest();
            $requestCert->name = $request->input('name');
            $requestCert->email = $request->input('email');
            $requestCert->status = $request->input('status');
            $requestCert->address = $request->input('address');
            $requestCert->save();
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully.',
            ]);
        }

    }

    
    public function edit($id)
    {
    $appSettings = [
        'barangay' => 'Guinacot',
        'province' => 'Cebu',
        'city' => 'Danao City',
    ];
    $allreq = CertRequest::where('id', $id)->first();
    return inertia('allrequest/Edit', [
        'user' => $allreq,
        'mode' => 'edit',
        'userType' => 'user',
        'appSettings' => $appSettings,
    ]);
    }

    public function destroy($id)
    {
        // Delete the record
        // Redirect or return a response
    }
}
