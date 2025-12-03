<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['user', 'event'])->get();
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('registrations.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
        ]);

        Registration::create($request->all());
        return redirect()->route('registrations.index')->with('success', 'Pendaftaran berhasil');
    }

    public function show(Registration $registration)
    {
        return view('registrations.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        $users = User::all();
        $events = Event::all();
        return view('registrations.edit', compact('registration', 'users', 'events'));
    }

    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
        ]);

        $registration->update($request->all());
        return redirect()->route('registrations.index')->with('success', 'Pendaftaran berhasil diperbarui');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('registrations.index')->with('success', 'Pendaftaran dihapus');
    }
}
