<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Edit User</h2>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label>Nama</label>
        <input type="text" name="name" class="w-full border p-2"
               value="{{ $user->name }}">

        <label>Email</label>
        <input type="email" name="email" class="w-full border p-2"
               value="{{ $user->email }}">

        <label>Role</label>
        <select name="role" class="w-full border p-2">
            <option value="admin" @selected($user->role == 'admin')>Admin</option>
            <option value="user" @selected($user->role == 'user')>User</option>
        </select>

        <label>Password baru (opsional)</label>
        <input type="password" name="password" class="w-full border p-2">

        <button class="mt-4 px-4 py-2 bg-blue-600 text-white">Update</button>
    </form>
</x-app-layout>
