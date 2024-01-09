<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
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
                            return view('admin.home', [
                                'users' => User::all(), // Pass the $users variable to the view
                            ]);
                        case '0':
                            // Retrieve all users from the database
                            $users = User::all();
                            return view('dashboard', compact('users'));
                        default:
                            return redirect()->back();
                    }
                default:
                    return redirect()->back();
            }
        }
    }
}
