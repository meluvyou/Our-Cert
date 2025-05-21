<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\RequestCert;
class CertRequestController extends Controller
{
    
    public function index()
    {
        $requestCert = RequestCert::all();

        //select * from request_certs

        return Inertia::render('CertRequest/Index', [
            'requestCert' => $requestCert,
        ]);
    }

    public function create()
    {
        return inertia('CertRequest/Edit', ['person' => null, 'mode' => 'create']);
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
            'phone' => 'required|mimes:docx|max:25',

        ]);

        if ($request->input('id')) {
            // Update existing record
            $allrequest = RequestCert::findOrFail($request->input('id'));
            $allrequest->name = $request->input('name');
            $allrequest->email = $request->input('email');
            $allrequest->address = $request->input('address');
            $allrequest->docxtype = $request->input('docxtype');
            $allrequest->phone = $request->input('phone');
            $allrequest->status = $request->input('status');

            $allrequest->save();
            return response()->json([ 
                'success' => true,
                'message' => 'Data updated successfully.',
            ]);
        }else {
            // Create new record
            $requestCert = new RequestCert();
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
        //$person = User::findOrFail(id: $id);
        
        $allreq = RequestCert::where('id', $id)->first();
        return inertia('allrequest/Edit', ['user' => $allreq, 'mode' => 'edit']);
    }

  

    public function destroy($id)
    {
        // Delete the record
        // Redirect or return a response
    }
}
