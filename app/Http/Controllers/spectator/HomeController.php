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
        $events = Event::where('event_status', 'accepted')->get();
        return view('home', compact('events'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function makeReservation(Request $request)
{
    $request->validate([
        'event_id' => 'required|integer|exists:events,id',
    ]);

    $eventId = $request->event_id;
    $userId = Auth::id();

    $event = Event::findOrFail($eventId);
    $user = Auth::user();

    // Create reservation
    $reservation = Reservation::create([
        'user_id' => $userId,
        'event_id' => $eventId,
        'status' => $event->automatic_accept ? 'accepted' : 'pending',
    ]);

    // Increment reserved seats
    $event->increment('reserved_seats');
    $event->save();

    // Generate PDF ticket
    $pdf = PDF::loadView('pdf.ticket', compact('user', 'event'));


    // Download the PDF ticket
    return $pdf->download('ticket.pdf');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('details', compact('event'));
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
