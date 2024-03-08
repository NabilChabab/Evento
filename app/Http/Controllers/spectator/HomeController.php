<?php

namespace App\Http\Controllers\spectator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('event_status', 'accepted')->latest()->take(4)->get();
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('status', 'accepted');
        })->with('reservations')->get();
        return view('home', compact('events', 'reservations'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function allEvents()
    {
        $events = Event::where('event_status', 'accepted')->paginate(8);
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('status', 'accepted');
        })->with('reservations')->get();
        return view('events', compact('events', 'reservations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function ticket(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        $pdf = PDF::loadView('pdf.ticket', compact('user', 'event'));
        return $pdf->download('ticket.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('status', 'accepted');
        })->with('reservations')->get();
        return view('details', compact('event', 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
