@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Pendaftaran</h2>

<a href="{{ route('admin.registrations.create') }}" class="btn btn-primary mb-3">Tambah Pendaftaran</a>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th class="border px-2 py-1">ID</th>
            <th class="border px-2 py-1">User</th>
            <th class="border px-2 py-1">Event</th>
            <th class="border px-2 py-1">Status</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($registrations as $r)
        <tr>
            <td class="border px-2 py-1">{{ $r->id }}</td>
            <td class="border px-2 py-1">{{ $r->user->name }}</td>
            <td class="border px-2 py-1">{{ $r->event->name }}</td>
            <td class="border px-2 py-1">{{ $r->status }}</td>
            <td class="border px-2 py-1">
                <a href="{{ route('admin.registrations.edit', $r->id) }}" class="text-blue-500">Edit</a>

                <form action="{{ route('admin.registrations.destroy', $r->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $registrations->links() }}

@endsection
