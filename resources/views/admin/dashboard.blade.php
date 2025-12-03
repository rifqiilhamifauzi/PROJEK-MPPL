@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-gray-600">Total Users</h2>
            <p class="text-3xl font-bold">{{ $totalUsers }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-gray-600">Total Events</h2>
            <p class="text-3xl font-bold">{{ $totalEvents }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-gray-600">Total Registrations</h2>
            <p class="text-3xl font-bold">{{ $totalRegistrations }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h2 class="text-gray-600">Total Attendances</h2>
            <p class="text-3xl font-bold">{{ $totalAttendances }}</p>
        </div>

    </div>

</div>
@endsection
