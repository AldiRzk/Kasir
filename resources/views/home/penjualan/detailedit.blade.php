@extends('layouts.master')
@section('content')
@section('title', 'detail')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data Produk</h4>
                <a href="/detail/{{$id_penjualan}}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/detail/{{$id_penjualan}}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nam Produk</label>
                        <select name="id_produk" id="" class="form-control">
                            <option value="" hidden>-- Pilih Produk --</option>
                            @foreach ($produk as $produk)
                            <option value="{{$produk->id}}">{{$produk->nama_produk}} -- Rp.{{number_format($produk->harga)}}</option>
                            @endforeach
                        </select>
                        @error('id_produk')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" value="{{old('jumlah', $detail->jumlah)}}"/>
                        @error('jumlah')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Subtotal</label>
                        <input type="number" class="form-control" name="subtotal" value="{{old('subtotal')}}"/>
                        @error('subtotal')
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
