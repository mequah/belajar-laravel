<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login()
  {
    // if (
    //   Auth::check()
    //     // dd(($))
    //     return redirect('/')
      
    // )
    return view('login');
  
  }
  public function register()
  {
    return view('register');
  }

  public function postLogin(Request $request)
  {
    // dd($request->all());
    if (
      Auth::attempt(
        [
          'email'=>$request->emailpengguna,
          'password'=>$request->passwordpengguna,
        ]
      )) {
    return redirect('/');
  }
  else {
    return back();
  }
}
  public function simpanRegistrasi(Request $request)
  {
    // dd($request->all());
    User::create([
      'name' => $request->namapengguna,
      'email' => $request->emailpengguna,
      'level' => 'mahasiswa',
      'password' => bcrypt($request->passwordpengguna),
    ]);
    // return back();
    return redirect('login');
  }
  public function logout(){
    Auth::logout();
    return redirect(('login'));
  } 
}