<?php

namespace App\Http\Controllers\hospital;

use App\Http\Controllers\Controller;

class Home extends Controller
{
  public function index()
  {

    return view('content.hospital-content.home');
  }
}
