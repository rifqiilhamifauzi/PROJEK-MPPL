<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user')->paginate(10);
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::doesntHave('profile')->get(); // hanya user yang belum ada profil
        return view('admin.profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id|unique:profiles,user_id',
            'full_name' => 'required|string',
            'phone'     => 'nullable|string',
            'address'   => 'nullable|string',
            'gender'    => 'nullable|string',
            'birth_date'=> 'nullable|date'
        ]);

        Profile::create($request->all());

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profil berhasil dibuat');
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'full_name' => 'required|string',
            'phone'     => 'nullable|string',
            'address'   => 'nullable|string',
            'gender'    => 'nullable|string',
            'birth_date'=> 'nullable|date'
        ]);

        $profile->update($request->all());

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profil berhasil dihapus');
    }
}
