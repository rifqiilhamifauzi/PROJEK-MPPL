<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Manajemen User</h2>

    <a href="{{ route('users.create') }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">Tambah User</a>

    <table class="w-full mt-4 border">
        <tr class="bg-gray-200">
            <th class="p-2">Nama</th>
            <th class="p-2">Email</th>
            <th class="p-2">Role</th>
            <th class="p-2">Aksi</th>
        </tr>

        @foreach ($users as $user)
        <tr>
            <td class="p-2 border">{{ $user->name }}</td>
            <td class="p-2 border">{{ $user->email }}</td>
            <td class="p-2 border">{{ $user->role }}</td>
            <td class="p-2 border">
                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600">Edit</a>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus user ini?')" class="text-red-600">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
