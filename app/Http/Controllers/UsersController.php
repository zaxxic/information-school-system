<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin.users', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'role' => 'required|in:1,2,3,4,5,6',
                'phone' => 'required|string|max:15 ',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email harus valid.',
                'email.unique' => 'Email sudah digunakan.',
                'email.max' => 'Email tidak boleh lebih dari :max karakter.',
                'role.required' => 'Role harus dipilih.',
                'role.in' => 'Role harus salah satu dari Guru, Ekstra, atau OSIS.',
                'phone.required' => 'Nomer telepon harus diisi.',
                'phone.string' => 'Nomer telepon harus berupa teks.',
                'phone.max' => 'Nomer telepon tidak boleh lebih dari :max karakter.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'There are validation errors. Please check the form.');
        }
        $password = '$2y$10$X4MR2ZYJMde/IRUXaVK7.uZiaIDMZKSamCG/8hMtGeFxLu6DZfb.C';
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $password;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function change_index()
    {
        return view('admin.ganti');
    }

    public function update_pass(Request $request)
    {
        try {
            $validator = $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|string|min:8|confirmed',
            ], [
                'current_password.required' => 'Password saat ini harus disi.',
                'new_password.required' => 'Passowrd baru harus di isi.',
                'new_password.string' => 'password harus berupa string.',
                'new_password.min' => 'Password minimal :min karakter.',
                'new_password.confirmed' => 'Kondirmasi password salah.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'There are validation errors. Please check the form.');
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Password berhasil di rubah');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validator = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'role' => 'required|in:Guru,Ekstra,OSIS',
                'phone' => 'required|string|max:15',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Email harus valid.',
                'email.unique' => 'Email sudah digunakan.',
                'email.max' => 'Email tidak boleh lebih dari :max karakter.',
                'role.required' => 'Role harus dipilih.',
                'role.in' => 'Role harus salah satu dari Guru, Ekstra, atau OSIS.',
                'phone.required' => 'Nomer telepon harus diisi.',
                'phone.string' => 'Nomer telepon harus berupa teks.',
                'phone.max' => 'Nomer telepon tidak boleh lebih dari :max karakter.',
            ]);
        } catch (ValidationException $e) {
            $validator = $e->validator;

            return redirect()->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Error chek lagi form yang anda isi.');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'User berhasil di perbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
