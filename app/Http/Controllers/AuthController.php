<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login-form');
    }

    public function registerForm()
    {
        return view('auth.register-form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        // Cek jika username = nim dan password = nim
        if ($username === 'nim' && $password === 'nim') {
            return redirect('/home')->with('success', 'Selamat Datang Admin!');
        }

        // Untuk demo, jika bukan admin maka tampilkan pesan error
        return redirect()->back()->withErrors([
            'login' => 'Username atau password salah!'
        ])->withInput();
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'alamat' => 'required|max:300',
            'tanggal_lahir' => 'required|date',
            'username' => 'required',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d)/',
            'confirm_password' => 'required|same:password'
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.regex' => 'Nama tidak boleh mengandung angka',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.max' => 'Alamat maksimal 300 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.date' => 'Format tanggal lahir tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.regex' => 'Password harus mengandung huruf kapital dan angka',
            'confirm_password.required' => 'Konfirmasi password harus diisi',
            'confirm_password.same' => 'Password dan konfirmasi password tidak sama'
        ]);

        // Jika validasi berhasil, redirect ke login dengan pesan sukses
        return redirect()->route('auth.login.form')->with('success', 'Registrasi berhasil! Silakan Login');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
