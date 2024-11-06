@extends('layouts.master')
@section('content')
@section('title', 'produk')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Data Produk</h4>
                <a href="/produk/tambah" class="btn btn-primary">Tambah Data Produk</a>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered align-items-center" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $produk)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{'/storage/products/'. $produk->gambar}}" alt="{{$produk->gambar}}" class="rounded" style="width: 150px"></td>
                            <td>{{$produk->nama_produk}}</td>
                            <td>Rp. {{number_format($produk->harga)}}</td>
                            <td>{{number_format($produk->stok)}}</td>
                            <td>
                                <a href="/produk/{{$produk->id}}/edit" class="btn btn-warning">Edit</a>
                                <a href="/produk/{{$produk->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Dihapus?. Data Penjualan Yang Berhubungan Dengan Detailpenjualan Akan Terhapus')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection
