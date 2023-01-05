<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            
        ]);
    }

    public function store(Request $request)
    {
         $validatedData = $request ->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

       $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        request(session()->flash('success', 'Registration successfully!          Please sign in'));

        return redirect('/login')->with('success', 'Registration successfull! Please sign in');
    }

}