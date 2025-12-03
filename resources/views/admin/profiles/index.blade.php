@extends('admin.layout')

@section('content')
<h2>Manajemen Profil</h2>
<a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">Tambah Profil</a>

<table class="table mt-3">
    <tr>
        <th>User</th>
        <th>Nama Lengkap</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    @foreach ($profiles as $profile)
    <tr>
        <td>{{ $profile->user->email }}</td>
        <td>{{ $profile->full_name }}</td>
        <td>{{ $profile->phone }}</td>
        <td>
            <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $profiles->links() }}

@endsection
