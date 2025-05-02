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
}
