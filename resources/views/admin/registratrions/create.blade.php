@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Tambah Pendaftaran</h2>

<form method="POST" action="{{ route('admin.registrations.store') }}">
    @csrf

    <label>User</label>
    <select name="user_id" class="border w-full mb-3">
        @foreach($users as $u)
        <option value="{{ $u->id }}">{{ $u->name }}</option>
        @endforeach
    </select>

    <label>Event</label>
    <select name="event_id" class="border w-full mb-3">
        @foreach($events as $e)
        <option value="{{ $e->id }}">{{ $e->name }}</option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status" class="border w-full mb-3">
        <option value="pending">Pending</option>
        <option value="approved">Disetujui</option>
        <option value="rejected">Ditolak</option>
    </select>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection

