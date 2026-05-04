<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prodi;
use Illuminate\Support\Facades\Hash;



class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->with('prodi')->get();

        return view('superadmin.admin.index', compact('admins'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('superadmin.admin.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'prodi_id' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'prodi_id.required' => 'Program studi wajib dipilih'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'prodi_id' => $request->prodi_id
        ]);

        return redirect('/superadmin/admin-user')->with('success', 'Admin berhasil dibuat');
    }

    public function destroy(User $admin_user)
    {
        $admin_user->delete();
        return back()->with('success', 'Admin dihapus');
    }

    public function update(Request $request, User $admin_user)
    {
        $admin_user->update($request->except('password'));

        return redirect('/superadmin/admin-user')->with('success', 'Admin berhasil diupdate');
    }
}
