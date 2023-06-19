<?php

namespace App\Http\Controllers;
use Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  function home()
  {
    return view ('home');
  }
  function dashboard()
  {
    return view ('dashboard');
  }
  // function register() {
  //   return view ('register');
  // }
  // function saveregister() {
  //   return view ('saveregister');
  // }
}
