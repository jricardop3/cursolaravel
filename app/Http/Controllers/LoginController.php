<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request){
        $credenciais = $request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ], [
            'email.required'=>'O Campo E-Mail é obrigatório!',
            'email.email'=>'O E-Mail não é valido!',
            'password.required'=>'O Campo Senha é obrigatório!',
        ]);
       if(Auth::attempt($credenciais)){
        $request->session()->regenerate();
        return redirect()->intended('admin/dashboard');
       } else{
        return redirect()->back()->with('erro','Email ou senha inválida.');
       }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('site.index'));

    }
    public function create (){
        return view('login.create');
    }
}
