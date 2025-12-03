@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Pendaftaran</h2>

<form method="POST" action="{{ route('admin.registrations.update', $registration->id) }}">
    @csrf @method('PUT')

    <label>User</label>
    <select name="user_id" class="border w-full mb-3">
        @foreach($users as $u)
        <option value="{{ $u->id }}" @selected($u->id == $registration->user_id)>{{ $u->name }}</option>
        @endforeach
    </select>

    <label>Event</label>
    <select name="event_id" class="border w-full mb-3">
        @foreach($events as $e)
        <option value="{{ $e->id }}" @selected($e->id == $registration->event_id)>{{ $e->name }}</option>
        @endforeach
    </select>

    <label>Status</label>
    <select name="status" class="border w-full mb-3">
        <option value="pending" @selected($registration->status == 'pending')>Pending</option>
        <option value="approved" @selected($registration->status == 'approved')>Disetujui</option>
        <option value="rejected" @selected($registration->status == 'rejected')>Ditolak</option>
    </select>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
