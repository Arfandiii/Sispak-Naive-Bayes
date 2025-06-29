<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $users = User::where('role', 'user')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]); // agar query string tetap di pagination
    
        return view('admin.users.index', compact('users', 'search'));
    }

    public function verify(Request $request, User $user)
    {
        if ($user->email_verified_at) {
            return redirect()->back()->with('info', 'User telah terverifikasi.');
        }
        $user->update(['email_verified_at' => Carbon::now()]);
        return redirect()->back()->with('success', 'User berhasil diverifikasi.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     $title = 'Tambah Pengguna';

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima menggunakan metode validate dari objek $request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nisn' => ['required', 'string','max:10', 'min:10', 'unique:users,nisn'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:dns', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'nisn' => ['nullable', 'string'],
        ]);
    
        // Admin hanya bisa mengubah nama, email, edu_level_id, phone, dan dob
        $user->update([
            'name' => $validatedData['name'],
            'nisn' => $validatedData['nisn'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'dob' => $validatedData['dob']
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete(); // Menghapus data user dari database
            return redirect()->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')
            ->with('error', 'Terjadi kesalahan saat menghapus User: ' . $e->getMessage());
        }
    }
}
