<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
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
    public function booking()
{
    $reservations = Event::with(['users' => function ($query) {
        $query->wherePivot('status', 'pending');
    }])->get();

    return view('organizer.booking', compact('reservations'));
}
public function updateStatus(Request $request, $user, $event)
    {
      $request->validate([
        'status' => 'required|in:pending,accepted,refused',
      ]);
      $user = User::findOrFail($user);
      $event = Event::findOrFail($event);
      $event->users()->updateExistingPivot($user->id, [
        'status' => $request->status,
      ]);
      return redirect()->back()->with('status', 'Status updated successfully.');
    }
}
