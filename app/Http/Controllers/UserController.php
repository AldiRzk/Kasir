<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view("home.user.index", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("home.user.tambah");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|unique:users,name",
            "username"=> "required",
            "role"=> "required",
            "email"=> "required|email",
            "password"=> "required",
        ]);
        User::create($request->all());
        return redirect('/user')->with('success','Data User Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('home.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name"=> "required|string",
            "username"=> "required",
            "role"=> "required",
            "email"=> "required|email",
            "password"=> "required",
        ]);
        User::find($id)->update($request->all());
        return redirect('/user')->with('success','Data User Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect('/user')->with('success','Data Berhasil Diupdate');
    }
}
