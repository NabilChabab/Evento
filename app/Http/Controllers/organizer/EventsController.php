<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organizer.events');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('organizer.create.events' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = new Event([
            'title' => $request->title,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'total_seats' => $request->input('total-seats'),
            'date' => $request->date,
            'category_id' => $request->category,
            'event_status' => $request->autostatus === 'automatic' ? 'accepted' : 'pending',
            'createdBy' => Auth::id()
        ]);
        $event->addMediaFromRequest('cover')->toMediaCollection('media/events' , 'media_events');

        $event->save();
        return redirect()->back()->with('status', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
