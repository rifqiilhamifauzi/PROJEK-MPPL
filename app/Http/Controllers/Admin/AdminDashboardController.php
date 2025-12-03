<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Attendance;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalEvents' => Event::count(),
            'totalRegistrations' => Registration::count(),
            'totalAttendances' => Attendance::count(),
        ]);
    }
}
