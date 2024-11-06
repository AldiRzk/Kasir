@extends('layouts.master')
@section('content')
@section('title', 'pelanggan')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data Pelanggan</h4>
                <a href="/pelanggan" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/pelanggan/simpan" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="{{old('nama_pelanggan')}}"/>
                        @error('nama_pelanggan')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">No. Tlp</label>
                        <input type="number" class="form-control" name="no_tlp" value="{{old('no_tlp')}}"/>
                        @error('no_tlp')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{old('alamat')}}</textarea>
                        @error('alamat')
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
