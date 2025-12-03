<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with(['user', 'event'])->paginate(10);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function create()
    {
        $users = User::all();
        $events = Event::all();

        return view('admin.registrations.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'status' => 'required'
        ]);

        Registration::create($request->all());

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Pendaftaran berhasil dibuat.');
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        $users = User::all();
        $events = Event::all();

        return view('admin.registrations.edit', compact('registration', 'users', 'events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'status' => 'required'
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Pendaftaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Registration::destroy($id);

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
