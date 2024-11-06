@extends('layouts.master')
@section('content')
@section('title', 'penjualan')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Data Penjualan</h4>
                <a href="/penjualan/tambah" class="btn btn-primary">Tambah Data Penjualan</a>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal penjualan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $penjualan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$penjualan->user->name}}</td>
                            <td>{{$penjualan->pelanggan->nama_pelanggan}}</td>
                            <td>{{$penjualan->tgl_penjualan}}</td>
                            <td>{{$penjualan->total_harga}}</td>
                            <td>
                                @if ($penjualan->total_harga == 0)
                                <a href="/detail/{{$penjualan->id}}" class="btn btn-warning">Lengkapi Transaksi</a>
                                @else
                                <a href="/detail/{{$penjualan->id}}/struk" class="btn btn-danger" target="_blank">Cetak</a>
                                @endif
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
