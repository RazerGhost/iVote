<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
     {
        if(Auth::id())
        {
          $is_admin=Auth()->user()->is_admin;
          
          if($is_admin=='0')
          {
            return view('dashboard');
          }

          else if($is_admin=='1')
          {
            return view('admin.adminhome');
          }

          else
          {
            return redirect()->back();
          }
        }
     }
}