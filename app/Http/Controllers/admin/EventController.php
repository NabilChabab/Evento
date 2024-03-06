<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }


    public function updateEventsStatus(Request $request)
    {
        $request->validate(
            [
                'event_id' => 'required',
                'status' => 'required',
            ]
        );
        $event = Event::findOrFail($request->event_id);
        $event->update([
            'event_status' => $request->status,
        ]);

        return redirect('evento/events')->with('status', 'Event status updated successfully');
    }

}
