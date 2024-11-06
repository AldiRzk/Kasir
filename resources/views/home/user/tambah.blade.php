@extends('layouts.master')
@section('content')
@section('title', 'user')
<div class="container-fluid py-4">

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4>Tambah Data User</h4>
                <a href="/user" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-body">
                <form action="/user/simpan" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                        @error('name')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}"/>
                        @error('username')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}"/>
                        @error('email')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"/>
                        @error('password')
                        <div class="alert alert-warning">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="User">User</option>
                            <option value="Karyawan">Karyawan</option>
                        </select>
                        @error('role')
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
