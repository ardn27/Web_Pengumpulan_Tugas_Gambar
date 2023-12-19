<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Proyek;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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

    public function Profile(Request $request){
        $user = Auth::user();
        $project = Proyek::where('user_id', $user->id)->get();
        $totalPosts = $user->proyek()->count();
        return view('profile' , compact('user', 'project', 'totalPosts'));
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/project');
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],[
            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
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

    public function addPictureProfile(Request $request){
        $user = Auth::user();
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $filename = 'profile_picture_' . time() . '.' . $image->getClientOriginalExtension();

            // Simpan gambar ke storage
            $image->storeAs('public', $filename);
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            // Update kolom profil gambar di tabel pengguna
            $user->update(['profile_picture' => $filename]);
        }

        return redirect('/profil');
    }
}
