<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\RequestAccepted;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spectators = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'spectator');
        })->get();

        $organizers = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'organizer');
        })->get();

        return view('admin.users', compact('spectators', 'organizers'));
    }

    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'spectator_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,banned',
        ]);

        // Find the user with the provided spectator_id
        $user = User::findOrFail($request->spectator_id);

        // Update the status
        $user->status = $request->status;

        // If the status is being updated to 'accepted'
        if ($request->status === 'accepted') {
            // Assign the role of organizer
            $role = Role::where('name', 'organizer')->first();
            if ($role) {
                $user->roles()->sync([$role->id]);
            }

            // Send email notification to the user
            Mail::to($user->email)->send(new RequestAccepted($user));
        }

        $user->save();

        return redirect()->back()->with('status', 'User status updated successfully.');
    }

    public function updateOrganizerStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,banned',
        ]);

        $acceptedOrganizers = User::where('status', 'accepted')->whereHas('roles', function ($query) {
            $query->where('name', 'organizer');
        })->get();

        foreach ($acceptedOrganizers as $user) {
            $user->status = 'pending';
            $role = Role::where('name', 'spectator')->first();
            if ($role) {
                $user->roles()->sync([$role->id]);
            }

            $user->save();
        }

        return redirect()->back()->with('status', 'Pending spectators successfully updated to organizers.');
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
    public function store(Request $request)
    {
        //
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
