<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller{

    public function home(){
        return view("site.index");
    }

    public function authenticate(Request $request){
		$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect("/");
		}
		return back()->withErrors([
			'error' => 'Correo/Contraseña incorrecta',
		]);
	}

	public function login(){
		return view("site.login");
	}

	public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}
}
