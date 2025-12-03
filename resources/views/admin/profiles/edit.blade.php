@extends('admin.layout')

@section('content')
<h2>Edit Profil</h2>

<form method="POST" action="{{ route('admin.profiles.update', $profile) }}">
    @csrf @method('PUT')

    <label>Nama Lengkap</label>
    <input type="text" name="full_name" value="{{ $profile->full_name }}" class="form-control">

    <label>Telepon</label>
    <input type="text" name="phone" value="{{ $profile->phone }}" class="form-control">

    <label>Alamat</label>
    <textarea name="address" class="form-control">{{ $profile->address }}</textarea>

    <button class="btn btn-success mt-3">Perbarui</button>
</form>

@endsection
