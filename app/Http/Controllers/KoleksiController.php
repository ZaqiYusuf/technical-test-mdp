<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
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
            'buku_id' => 'required',
            'user_id' => 'required'
        ]);

        $koleksi = new Koleksi();
        $koleksi->buku_id = $request->buku_id;
        $koleksi->user_id = $request->user_id;
        $koleksi->save();

        return redirect('/koleksi-buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Koleksi $koleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Koleksi $koleksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Koleksi $koleksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Koleksi::where('id', $id)->delete();
        return redirect('/koleksi-buku');
    }
}
