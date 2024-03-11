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
        $user = User::findOrFail($request->spectator_id);
        $user->status = $request->status;
        if ($request->status === 'accepted') {
            $role = Role::where('name', 'organizer')->first();
            if ($role) {
                $user->roles()->sync([$role->id]);
            }
            Mail::to($user->email)->send(new RequestAccepted($user));
        } else {
            $role = Role::where('name', 'spectator')->first();
            if ($role) {
                $user->roles()->sync([$role->id]);
            }
        }
        $user->save();
        return redirect()->back()->with('status', 'User status updated successfully.');
    }

    public function updateOrganizerStatus(Request $request, string $id)
    {
        $request->validate([
            'spectator_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,banned',
        ]);
        $user = User::findOrFail($request->spectator_id);
        $user->status = $request->status;
        if ($request->status === 'pending') {
            $role = Role::where('name', 'spectator')->first();
            if ($role) {
                $user->roles()->sync([$role->id]);
            }
        }
        $user->save();
        return redirect()->back()->with('status', 'User status updated successfully.');
    }
}
