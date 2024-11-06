<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showlogin()
    {
        if (Auth::check()) {
            return redirect("/")->with("error","Anda Harus Login Terlebih Dahulu");
        }else{
            return view("login");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password'=> $request->password,
        ];
        if (Auth::attempt($data)) {
            return redirect('/')->with("success","Anda Berhasil Login");
        }else{
            return redirect('/login')->with('error','Email atau Password Yang Dimasukan Salah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login')->with("success","Anda Berhasil Logout");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
