<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organizer.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function booking(){
        $reservations = Event::whereHas('users')->with('users')->get();
        return view('organizer.booking' , compact('reservations'));
    }
}
