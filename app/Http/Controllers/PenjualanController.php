<?php

namespace App\Http\Controllers;

use App\Models\Detailpenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view("home.penjualan.index", compact("penjualan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $pelanggan = Pelanggan::all();
        return view("home.penjualan.tambah", compact("user","pelanggan"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "id_pelanggan"=> "required",
        ]);
        Penjualan::create([
            "id_user"=> Auth::user()->getAuthIdentifier(),
            "id_pelanggan"=> $request->id_pelanggan,
            "tgl_penjualan" => now(),
            "total_harga" => 0,
        ]);
        return redirect('/penjualan')->with('success','Data Penjualan Berhasil Ditambah');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function bayar(Request $request, string $id)
    {
        $id_penjualan = $id;
        $penjualan = Penjualan::find($id_penjualan);
        $penjualan->update([
            'total_harga'=> $request->total,
        ]);
        return redirect('/penjualan')->with('success','Trakasi Berhasil Dilakukan');
    }
    public function struk(Request $request, string $id)
    {
        $penjualan = Penjualan::find($id);
        $id_penjualan = $id;
        $total = Detailpenjualan::where("id_penjualan", $id_penjualan)->sum('subtotal');
        $detailpenjualan = Detailpenjualan::query()
        ->select('id_penjualan', 'id_produk', Detailpenjualan::raw('SUM(jumlah) as jml'), Detailpenjualan::raw('SUM(subtotal) as total'))
        ->where('id_penjualan', $id_penjualan)
        ->groupBy('id_penjualan', 'id_produk')
        ->get();
        return view('home.penjualan.struk', compact("id_penjualan","detailpenjualan", "penjualan", 'total'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //
    }
}
