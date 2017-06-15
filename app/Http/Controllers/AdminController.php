<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('estado');
      $this->middleware('auth');

      $this->middleware('admin');
  }

  public function index(){

    return view ('admin.index');
  }


}
