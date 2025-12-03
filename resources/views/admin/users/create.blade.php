<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Tambah User Baru</h2>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label>Nama</label>
        <input type="text" name="name" class="w-full border p-2">

        <label>Email</label>
        <input type="email" name="email" class="w-full border p-2">

        <label>Role</label>
        <select name="role" class="w-full border p-2">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>

        <label>Password</label>
        <input type="password" name="password" class="w-full border p-2">

        <button class="mt-4 px-4 py-2 bg-green-600 text-white">Simpan</button>
    </form>
</x-app-layout>
