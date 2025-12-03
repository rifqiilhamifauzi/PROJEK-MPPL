@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Presensi</h2>

<form method="POST" action="{{ route('admin.attendance.update', $attendance->id) }}">
    @csrf @method('PUT')

    <label>User</label>
    <select name="user_id" class="border rounded w-full p-2 mb-3">
        @foreach($users as $u)
        <option value="{{ $u->id }}" {{ $attendance->user_id == $u->id ? 'selected' : '' }}>
            {{ $u->name }}
        </option>
        @endforeach
    </select>

    <label>Event</label>
    <select name="event_id" class="border rounded w-full p-2 mb-3">
        @foreach($events as $e)
        <option value="{{ $e->id }}" {{ $attendance->event_id == $e->id ? 'selected' : '' }}>
            {{ $e->title }}
        </option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status" class="border rounded w-full p-2 mb-3">
        <option value="hadir" {{ $attendance->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
        <option value="izin" {{ $attendance->status == 'izin' ? 'selected' : '' }}>Izin</option>
        <option value="alpha" {{ $attendance->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
    </select>

    <label>Keterangan</label>
    <textarea name="description" class="border rounded w-full p-2 mb-3">{{ $attendance->description }}</textarea>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
