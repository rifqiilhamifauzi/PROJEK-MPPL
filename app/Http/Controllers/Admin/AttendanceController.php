<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'event'])->paginate(10);
        return view('admin.attendance.index', compact('attendances'));
    }

    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('admin.attendance.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'status' => 'required',
        ]);

        Attendance::create($request->all());

        return redirect()->route('admin.attendance.index')->with('success', 'Presensi berhasil ditambahkan.');
    }

    public function edit(Attendance $attendance)
    {
        $users = User::all();
        $events = Event::all();
        return view('admin.attendance.edit', compact('attendance', 'users', 'events'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'status' => 'required',
        ]);

        $attendance->update($request->all());

        return redirect()->route('admin.attendance.index')->with('success', 'Presensi berhasil diperbarui.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('admin.attendance.index')->with('success', 'Presensi berhasil dihapus.');
    }
}
