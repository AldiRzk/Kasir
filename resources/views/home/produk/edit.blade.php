@extends('layouts.master')
@section('content')
@section('title', 'produk')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Edit Produk</h4>
                <a href="/produk" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/produk/{{$produk->id}}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" value="{{old('gambar', $produk->gambar)}}"/>
                        @error('gambar')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk', $produk->nama_produk)}}"/>
                        @error('nama_produk')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{old('harga', $produk->harga)}}"/>
                        @error('harga')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" value="{{old('stok', $produk->stok)}}"/>
                        @error('stok')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>

    </section>
</div>
@endsection
