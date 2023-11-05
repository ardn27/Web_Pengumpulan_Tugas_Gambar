<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CekUserLogin;
use App\Models\User;
use App\Models\Proyek;
use Carbon\Carbon;

class ProyekController extends Controller
{
    public function Home(){
        return view ('/index-home');
    }

    public function indexProject(Request $request)
   {
    $showData=Proyek::orderBy('created_at', 'desc')->get();
    return view('index-project', ['datas'=>$showData])->with('userLoggedin', auth()->check());
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

        return redirect('/project')->with(['humanReadableDate' => $humanReadableDate])->with('success', 'Gambar Berhasil Ditambahkan');

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

        $addProject->save();
    }

    public function delete($id)
    {
        $dtdelete=Proyek::find($id);
        $dtdelete->delete();

        return redirect('/project');
    }
}
