<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class AdminVerificationController extends Controller
{

    public function index()
    {
        $datacar = Cars::where('verification_status', 2)->whereNotNull('verification_img')->get();
        return view('admin.verification', compact('datacar'));
    }

    public function store(Request $request)
    {
        //
    }
}
