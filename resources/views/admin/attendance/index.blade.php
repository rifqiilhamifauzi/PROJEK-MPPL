@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Presensi</h2>

<a href="{{ route('admin.attendance.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Presensi</a>

<table class="w-full border">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">User</th>
            <th class="p-2 border">Event</th>
            <th class="p-2 border">Status</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($attendances as $a)
        <tr>
            <td class="p-2 border">{{ $a->user->name }}</td>
            <td class="p-2 border">{{ $a->event->title }}</td>
            <td class="p-2 border">{{ $a->status }}</td>
            <td class="p-2 border">
                <a href="{{ route('admin.attendance.edit', $a->id) }}" class="text-blue-600">Edit</a> |
                <form action="{{ route('admin.attendance.destroy', $a->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600" onclick="return confirm('Hapus presensi?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $attendances->links() }}

@endsection
