<?php

namespace App\Http\Controllers;

use App\Models\Detailpenjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailpenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $id_penjualan = $id;
        $total = Detailpenjualan::where("id_penjualan", $id_penjualan)->sum('subtotal');
        $detailpenjualan = Detailpenjualan::query()
        ->select('id_penjualan', 'id_produk', Detailpenjualan::raw('SUM(jumlah) as jml'), Detailpenjualan::raw('SUM(subtotal) as total'))
        ->where('id_penjualan', $id_penjualan)
        ->groupBy('id_penjualan', 'id_produk')
        ->get();
        return view("home.penjualan.detail", compact("id_penjualan","detailpenjualan", "total"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $id_penjualan = $id;
        $detail = Detailpenjualan::where("id_penjualan", $id_penjualan);
        $produk = Produk::all();
        return view("home.penjualan.detailtambah", compact("detail","produk", 'id_penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $id_penjualan = $id;
        Detailpenjualan::create([
            "id_penjualan"=> $id_penjualan,
            "id_produk"=> $request->id_produk,
            "jumlah"=> $request->jumlah,
            "subtotal"=> $request->subtotal,
            "diskon"=> 0,
        ]);
        return redirect('/detail/'. $id_penjualan)->with("success","Produk Berhasil Ditambah");
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
        $id_penjualan = $id;
        $detail = Detailpenjualan::find($id);
        $produk = Produk::all();
        return view("home.penjualan.detailedit", compact("detail","produk", 'id_penjualan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        Detailpenjualan::find($id)->delete();
        return redirect()->back()->with('success','Produk Berhasil Dihapus');
    }
}
