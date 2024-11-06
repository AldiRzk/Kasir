<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view("home.produk.index", compact("produk"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.produk.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|unique:produks,nama_produk',
            'gambar' => 'required|image|mimes:png,jpg|max:4090',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        $image = $request->file('gambar');
        $image->storeAs('/products', $image->hashName(),'public');
        Produk::create([
            'gambar' => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        return redirect('/produk')->with('success','Data Produk Berhasil Ditambah');
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
        $produk = Produk::find($id);
        return view('home.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'gambar' => 'image|mimes:png,jpg|max:4090',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        $produk = Produk::find($id);
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $image->storeAs('/products', $image->hashName(),'public');
            Storage::disk('public')->delete('products/'. $produk->gambar);
            $produk->update([
                'gambar' => $image->hashName(),
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);
        }else{
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]);
        }
        return redirect('/produk')->with('success','Data Produk Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        Storage::disk('public')->delete('products/'. $produk->gambar);
        $produk->delete();
        return redirect('/produk')->with('success','Data Produk Berhasil Dihapus');
    }
}
