@extends('layouts.master')
@section('content')
@section('title', 'penjualan')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data Penjualan</h4>
                <a href="/penjualan" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/penjualan/simpan" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pelanggan</label>
                        <select name="id_pelanggan" id="" class="form-control">
                            <option value="" hidden>-- Pilih Pelanggan --</option>
                            @foreach ($pelanggan as $pelanggan)
                            <option value="{{$pelanggan->id}}">{{$pelanggan->nama_pelanggan}}</option>
                            @endforeach
                        </select>
                        @error('id_pelanggan')
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
