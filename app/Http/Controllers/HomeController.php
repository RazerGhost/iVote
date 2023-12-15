<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $is_admin = Auth()->user()->is_admin;
            $is_master = Auth()->user()->is_master;
            switch ($is_master) {
                case '1':
                    return view('master.home');
                case '0':
                    switch ($is_admin) {
                        case '1':
                            return view('admin.home');
                        case '0':
                            return view('dashboard');
                        default:
                            return redirect()->back();
                    }
                default:
                    return redirect()->back();
            }
        }
    }
}
