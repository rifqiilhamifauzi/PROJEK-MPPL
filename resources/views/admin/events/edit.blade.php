@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Event</h1>

<form action="{{ route('admin.events.update', $event) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Event</label>
    <input type="text" name="name" class="w-full border p-2" value="{{ $event->name }}" required>

    <label>Deskripsi</label>
    <textarea name="description" class="w-full border p-2">{{ $event->description }}</textarea>

    <label>Tanggal Mulai</label>
    <input type="date" name="start_date" class="w-full border p-2" value="{{ $event->start_date }}" required>

    <label>Tanggal Selesai</label>
    <input type="date" name="end_date" class="w-full border p-2" value="{{ $event->end_date }}" required>

    <label>Lokasi</label>
    <input type="text" name="location" class="w-full border p-2" value="{{ $event->location }}" required>

    <button class="px-4 py-2 bg-blue-600 text-white mt-4">Update</button>
</form>
@endsection
