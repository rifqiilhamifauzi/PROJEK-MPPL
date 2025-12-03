@extends('admin.layout')

@section('content')
<h2>Tambah Profil</h2>

<form method="POST" action="{{ route('admin.profiles.store') }}">
    @csrf

    <label>User</label>
    <select name="user_id" class="form-control">
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->email }}</option>
        @endforeach
    </select>

    <label>Nama Lengkap</label>
    <input type="text" name="full_name" class="form-control">

    <label>Telepon</label>
    <input type="text" name="phone" class="form-control">

    <label>Alamat</label>
    <textarea name="address" class="form-control"></textarea>

    <button class="btn btn-success mt-3">Simpan</button>
</form>

@endsection
