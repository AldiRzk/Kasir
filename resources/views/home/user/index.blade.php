@extends('layouts.master')
@section('content')
@section('title', 'user')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Data User</h4>
                <a href="/user/tambah" class="btn btn-primary">Tambah Data User</a>
                @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered " id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="/user/{{$user->id}}/edit" class="btn btn-warning">Edit</a>
                                <a href="/user/{{$user->id}}/hapus" class="btn btn-danger" onclick="return confirm('Yakin Dihapus?. Data Penjualan Yang Berhubungan Dengan User Akan Terhapus')">Hapus</a>
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
