<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function formRegis()
    {
        return view('registrasi');
    }

    public function formLogin(Request $request)
    {
        return view('login');
    }


    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect()->back()->with(['errors'=> 'email atau password salah']);
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],[
            'email.unique'=> 'email sudah digunakan',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        if($validator->fails())
        {
            return redirect('/form-regis')
            ->withErrors($validator)
            ->withInput();
        }

        // Membuat pengguna baru
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if ($user = User::create($data)) {
            session()->flash('regis-success', 'Registrasi Berhasil, Gunakan Email dan Password Untuk Login');
            return redirect('/login-form');
        } else {
            session()->flash('error', 'Registrasi Gagal, Silakan coba lagi');
            return redirect()->back();
        }
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        session()->regenerate();
        return redirect('/project');
    }


}
