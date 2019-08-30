<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcements;
use Auth;

class AdminAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcements::all();
        return view('admin.announcements', compact('announcements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcements = new Announcements;

        $announcements->title = $request->get('title');
        $announcements->announcement = $request->get('announcement');
        $announcements->user = $request->get('user');

        $announcements->save();
        return back();
    }
}
