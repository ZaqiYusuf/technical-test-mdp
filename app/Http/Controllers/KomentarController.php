<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Buku;
use Illuminate\Http\Request;

class KomentarController extends Controller
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
    public function create($id)
    {
        $komentar = Komentar::all();
        $buku = Buku::where('buku_id', $id)->first();
        return view('page.komentar.create', compact('komentar', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required',
            'reviews' => 'required',
            'reting' => 'required'
        ]);

        Komentar::create([
            'buku_id' => $request->buku_id,
            'user_id' => $request->user_id,
            'reviews' => $request->reviews,
            'reting' => $request->reting
        ]);

        return redirect('/pendataan-buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komentar $komentar)
    {
        //
    }
}
