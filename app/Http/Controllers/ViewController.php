<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Buku;
use App\Models\Komentar;
use App\Models\Peminjams;
use App\Models\Koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success-logout', 'Anda berhasil logout!');
    }

    public function layout()
    {
        return view('layout.dashboard');
    }

    public function dataPengguna()
    {
        $users = User::all();
        return view('page.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('page.users.create');
    }

    public function kategoriBuku()
    {
        $kategori = Kategori::all();
        return view('page.kategori-buku.index', compact('kategori'));
    }

    public function createKategori()
    {
        return view('page.kategori-buku.create');
    }

    public function buku()
    {
        $buku = Buku::all();
        $peminjam = Peminjams::all();
        return view('page.buku.index', compact('buku', 'peminjam'));
    }

    public function createBuku()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('page.buku.create', compact('buku', 'kategori'));
    }

    public function dataPeminjaman()
    {
        $peminjam = Peminjams::where('user_id', auth()->user()->id)->get();
        $admin = Peminjams::all();
        return view('page.data-peminjaman.index', compact('peminjam', 'admin'));
    }

    public function review($id)
    {
        $komentar = Komentar::all();
        $buku = Buku::where('buku_id', $id)->first();
        return view('page.komentar.index', compact('komentar', 'buku'));
    }

    public function koleksiBuku()
    {
        $koleksi = Koleksi::where('user_id', auth()->user()->id)->get();
        return view('page/koleksi-buku/index', compact('koleksi'));
    }

}
