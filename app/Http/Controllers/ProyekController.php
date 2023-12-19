<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CekUserLogin;
use App\Models\User;
use App\Models\Proyek;
use App\Models\Comment;
use Carbon\Carbon;

class ProyekController extends Controller
{
    public function Home(Request $request){
        $user = Auth::user();
        return view ('/index-home', compact('user'))->with('userLoggedin', auth()->check());
    }

    public function indexProject(Request $request)
   {
    $user = Auth::user();
    $showData = Proyek::orderBy('created_at', 'desc')->get();
    return view('index-project', compact('user', 'showData'))->with('userLoggedin', auth()->check());
   }

   public function indexApiProject(Request $request)
{
    $user = Auth::user();
    $showData = Proyek::orderBy('created_at', 'desc')->get();

    // Ambil informasi pengguna berdasarkan user_id
    $userData = User::whereIn('id', $showData->pluck('user_id'))->pluck('name', 'id');

    // Tambahkan informasi pengguna ke setiap proyek
    $projects = $showData->map(function ($project) use ($userData) {
        $project['nama_pengguna'] = $userData[$project->user_id] ?? 'Unknown User';
        return $project;
    });

    return response()->json(['status' => 200, 'message' => 'success', 'projects' => $projects]);
}


   public function About(){
    return view('/about');
   }

   public function editProject($id)
   {
    $edit = Proyek::find($id);
    if ($edit->user_id != auth()->user()->id) {
        return redirect()->back()->with('errors', 'Anda Tidak Memiliki Akses Untuk Mengubah Postingan Ini');
    }
    return view('edit-project', ['post'=>$edit]);
   }

    public function store(Request $request)
    {
        $userPost = Auth::user();

        $addProject = new Proyek();
        $addProject->nama = $request->nama;
        $addProject->nbi = $request->nbi;
        $addProject->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('public/image', $request->file('gambar')->getClientOriginalName());
            $addProject->gambar = $request->file('gambar')->getClientOriginalName();
            }

        $addProject->user_id = $userPost->id;

        $addProject->save();
        $createdAt = $addProject->created_at;

        $humanReadableDate = $createdAt->diffForHumans();

        return redirect('/project')->with(['humanReadableDate' => $humanReadableDate])->with('success', 'Postingan Berhasil Diunggah');

    }

    public function edit(Request $request)
    {
        $edit = Proyek::findOrFail($request->id);
        $edit->nama = $request->nama;
        $edit->nbi = $request->nbi;
        $edit->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('public/image', $request->file('gambar')->getClientOriginalName());
            $edit->gambar = $request->file('gambar')->getClientOriginalName();
        }

        $edit->save();
        return redirect('/project')->with('success', 'Postingan berhasil Diubah');
    }

    public function delete($id)
    {
        $dtdelete = Proyek::find($id);

        // Periksa apakah pengguna adalah pemilik proyek
        if ($dtdelete->user_id != auth()->user()->id) {
            return redirect()->back()->with('errors', 'Anda tidak dapat menghapus postingan ini');
        }

        $dtdelete->delete();

        return redirect('/project');
    }
}
