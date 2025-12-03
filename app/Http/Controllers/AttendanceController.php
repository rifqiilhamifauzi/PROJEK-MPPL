<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'event'])->get();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('attendances.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'status' => 'required',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendances.index')->with('success', 'Presensi disimpan');
    }

    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $users = User::all();
        $events = Event::all();
        return view('attendances.edit', compact('attendance', 'users', 'events'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendances.index')->with('success', 'Presensi diupdate');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Presensi dihapus');
    }
}
