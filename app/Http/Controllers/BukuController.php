<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required',
            'category_buku' => 'required',
            // 'status' => 'required'
        ]);

        // dd($request->all());

        $imgCover = $request->file('cover');
        $img = time() . rand() . '.' . $imgCover->extension();

        if (!file_exists(public_path(('/storage/image/' . $imgCover->getClientOriginalName())))) {
            $destinationPath = public_path('/storage/image/');
            $imgCover->move($destinationPath, $img);
            $upload = $img;
        } else {
            $upload = $img;
        }

        Buku::create([
            'cover' => $upload,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_year' => $request->publication_year,
            'category_buku' => $request->category_buku,
            'status' => 'Tersedia'
        ]);

        return redirect('/pendataan-buku')->with('toast_success', 'Data Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $buku = Buku::where('buku_id', $id)->first();
        $kategori = Kategori::all();
        return view('page.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required',
            'category_buku' => 'required',
            // 'status' => 'required'
        ]);

        $imgCover = $request->file('cover');
        $img = time() . rand() . '.' . $imgCover->extension();

        if (!file_exists(public_path(('/storage/image/' . $imgCover->getClientOriginalName())))) {
            $destinationPath = public_path('/storage/image/');
            $imgCover->move($destinationPath, $img);
            $upload = $img;
        } else {
            $upload = $img;
        }

        Buku::where('buku_id', $id)->update([
            'cover' => $upload,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_year' => $request->publication_year,
            'category_buku' => $request->category_buku,
            'status' => 'Tersedia'
        ]);

        return redirect('/pendataan-buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Buku::where('id', $id)->delete();
        return redirect('/pendataan-buku');
    }
}
