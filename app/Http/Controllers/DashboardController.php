<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.index');
    }

    public function user()
    {
        $user= User::where('role','=','user')->get();
        return view('dashboard.admin.user.index',compact('user'));

    }

}
