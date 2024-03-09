<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('id' , 'desc')->get();
        $categories = Category::orderBy('id' , 'desc')->get();
        return view('admin.events', compact('events' , 'categories'));
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
