<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->take(4)->get();
        $userCount = User::count();
        $reservationCount = Reservation::count();
        $eventCount = Event::count();
        return view('admin.dashboard', compact('users','userCount', 'reservationCount', 'eventCount'));
    }
}
