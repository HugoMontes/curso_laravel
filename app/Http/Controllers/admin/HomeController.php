<?php

namespace Cinema\Http\Controllers\admin;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;

class HomeController extends Controller{
  public function index(){
    return view('admin.index');
  }
}
