<?php

namespace App\Http\Controllers;

use App\Models\Peminjams;
use Illuminate\Http\Request;

class PeminjamsController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required',
            'user_id' => 'required',
            'lending_date' => 'required',
            'return_date' => '',
            'status' => 'required'
        ]);

        $peminjams = new Peminjams();
        $peminjams->buku_id = $request->buku_id;
        $peminjams->user_id = $request->user_id;
        $peminjams->lending_date = $request->lending_date;
        $peminjams->return_date = $request->return_date;
        $peminjams->status = $request->status;
        $peminjams->save();

        return redirect('/pendataan-buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjams $peminjams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjams $peminjams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'return_date' => 'required',
            'status' => 'required'
        ]);

        Peminjams::where('id', $id)->update([
            'return_date' => $request->return_date,
            'status' => $request->status
        ]);

        return redirect('pendataan-buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjams $peminjams)
    {
        //
    }
}
