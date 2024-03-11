<?php

namespace App\Http\Controllers\spectator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{

    public function index()
    {
        $events = Event::where('event_status', 'accepted')->latest()->take(4)->get();
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user?->id)->where('status', 'accepted');
        })->with('reservations')->get();
        $categories = Category::all();
        return view('home', compact('events', 'reservations', 'categories'));
    }



    public function allEvents()
    {
        $events = Event::where('event_status', 'accepted')->latest()->paginate(8);
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('status', 'accepted');
        })->with('reservations')->get();
        $categories = Category::all();
        return view('events', compact('events', 'reservations', 'categories'));
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            $events = Event::where('event_status', 'accepted')
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%$query%")
                        ->orWhereHas('category', function ($q) use ($query) {
                            $q->where('name', 'like', "%$query%");
                        });
                })->with('media')->paginate(8);

            $transformedEvents = $events->map(function ($event) {
                $mediaUrl = $event->getFirstMediaUrl('media/events');

                $event['media_url'] = $mediaUrl;

                return $event;
            });

            return response()->json($transformedEvents);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }


    public function ticket(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $user = Auth::user();
        $pdf = PDF::loadView('pdf.ticket', compact('user', 'event'));
        return $pdf->download('ticket.pdf');
    }

    public function show(string $id)
    {
        $event = Event::findOrFail(base64_decode($id));
        $user = Auth::user();
        $reservations = Event::whereHas('reservations', function ($query) use ($user) {
            $query->where('user_id', $user->id)->where('status', 'accepted');
        })->with('reservations')->get();
        return view('details', compact('event', 'reservations'));
    }
}
