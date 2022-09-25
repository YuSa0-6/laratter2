<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChangePasswordController extends Controller
{
    //
    public function __construct()
  {
      $this->middleware('auth');
  }
 
  public function edit()
  {
    return view('auth.passwords.edit')
            ->with('user', \Auth::user());
  }
 
  public function update(Request $request)
  {
    dd($request);
  }
}
