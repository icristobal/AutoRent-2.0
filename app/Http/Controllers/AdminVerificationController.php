<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class AdminVerificationController extends Controller
{

    public function index()
    {
        return view('admin.verification');
    }

    public function store(Request $request)
    {
        //
    }
}
