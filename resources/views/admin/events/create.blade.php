@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Event</h1>

<form action="{{ route('admin.events.store') }}" method="POST">
    @csrf

    <label>Nama Event</label>
    <input type="text" name="name" class="w-full border p-2" required>

    <label>Deskripsi</label>
    <textarea name="description" class="w-full border p-2"></textarea>

    <label>Tanggal Mulai</label>
    <input type="date" name="start_date" class="w-full border p-2" required>

    <label>Tanggal Selesai</label>
    <input type="date" name="end_date" class="w-full border p-2" required>

    <label>Lokasi</label>
    <input type="text" name="location" class="w-full border p-2" required>

    <button class="px-4 py-2 bg-green-600 text-white mt-4">Simpan</button>
</form>
@endsection
