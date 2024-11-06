@extends('layouts.master')
@section('content')
@section('title', 'pelanggan')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Data Pelanggan</h4>
                <a href="/pelanggan/tambah" class="btn btn-primary">Tambah Data Pelanggan</a>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>No. Tlp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $pelanggan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pelanggan->nama_pelanggan}}</td>
                            <td>{{$pelanggan->no_tlp}}</td>
                            <td>{{$pelanggan->alamat}}</td>
                            <td>
                                <a href="/pelanggan/{{$pelanggan->id}}/edit" class="btn btn-warning" onclick="retun confirm('Yakin Dihapus?. Data Penjualan Yang Berhubungan Dengan Pelanggan Akan Terhapus')">Edit</a>
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
