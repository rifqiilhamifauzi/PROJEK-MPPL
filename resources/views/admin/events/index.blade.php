@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Event</h1>

<a href="{{ route('admin.events.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Event</a>

@if(session('success'))
    <div class="mt-3 p-2 bg-green-200">{{ session('success') }}</div>
@endif

<table class="w-full mt-4 border">
    <tr class="bg-gray-100">
        <th class="p-2 border">Nama</th>
        <th class="p-2 border">Tanggal</th>
        <th class="p-2 border">Lokasi</th>
        <th class="p-2 border">Aksi</th>
    </tr>

    @foreach($events as $event)
    <tr>
        <td class="border p-2">{{ $event->name }}</td>
        <td class="border p-2">{{ $event->start_date }} - {{ $event->end_date }}</td>
        <td class="border p-2">{{ $event->location }}</td>
        <td class="border p-2">
            <a class="text-blue-600" href="{{ route('admin.events.edit', $event) }}">Edit</a> |
            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button class="text-red-600" onclick="return confirm('Hapus event ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
