<?php

namespace Blog\Http\Controllers\admin;

use Illuminate\Http\Request;

use Blog\Http\Requests;
use Blog\Http\Controllers\Controller;

class HomeController extends Controller{
  public function index(){
    return view('admin.index');
  }
}
