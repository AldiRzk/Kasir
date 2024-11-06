<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view("home.pelanggan.index", compact("pelanggan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.pelanggan.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama_pelanggan"=> "required|string",
            "no_tlp"=> "required|numeric",
            "alamat"=> "required",
        ]);
        Pelanggan::create($request->all());
        return redirect('/pelanggan')->with('success','Data Pelanggan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('home.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nama_pelanggan"=> "required|string",
            "no_tlp"=> "required|numeric",
            "alamat"=> "required",
        ]);
        Pelanggan::find($id)->update($request->all());
        return redirect("/pelanggan")->with("success","Data Pelanggan Berhasil Diedit");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
