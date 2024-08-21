<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
            'category_name',
        ]);

        Kategori::create([
            'category_name' => $request->category_name,
        ]);

        return redirect('/kategori-buku')->with('success-kategori', 'Berhasil menambahkan kategori buku!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::where('id_category', $id)->first();
        return view('page.kategori-buku.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        Kategori::where('id', $id)->update([
            'category_name' => $request->category_name,
        ]);

        return redirect('/kategori-buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Kategori::find($id);
        $id->delete();
        return redirect('/kategori-buku')
        ->with('deletekategori', 'Berhasil menghapus kategori!');
    }
}
