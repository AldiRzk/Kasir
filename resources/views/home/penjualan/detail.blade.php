@extends('layouts.master')
@section('content')
@section('title', 'detail')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Data Detail</h4>
                <a href="/detail/{{$id_penjualan}}/tambah" class="btn btn-primary">Tambah Produk</a>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <h4>Total Harga: Rp. {{number_format($total)}}</h4>
                <form action="/detail/{{$id_penjualan}}/bayar" method="POST">
                    @csrf
                <input type="text" value="{{$total}}" name="total" hidden>
                <button type="submit" class="btn btn-warning">Bayar</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailpenjualan as $detail)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$detail->produk->nama_produk}}</td>
                            <td>{{number_format($detail->jml)}}</td>
                            <td>{{number_format($detail->total)}}</td>
                            <td>
                                <a href="/detail/{{$detail->id}}/edit" class="btn btn-warning">Edit</a>
                                <a href="/detail/{{$detail->id}}/hapus" class="btn btn-danger">Hapus</a>
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
