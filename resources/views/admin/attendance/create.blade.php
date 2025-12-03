@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Presensi</h2>

<form method="POST" action="{{ route('admin.attendance.store') }}">
    @csrf

    <label>User</label>
    <select name="user_id" class="border rounded w-full p-2 mb-3">
        @foreach($users as $u)
        <option value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>

    <label>Event</label>
    <select name="event_id" class="border rounded w-full p-2 mb-3">
        @foreach($events as $e)
        <option value="{{ $e->id }}">{{ $e->title }}</option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status" class="border rounded w-full p-2 mb-3">
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="alpha">Alpha</option>
    </select>

    <label>Keterangan (optional)</label>
    <textarea name="description" class="border rounded w-full p-2 mb-3"></textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
