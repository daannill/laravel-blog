<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request) {
        $ValidatedData = $request->validate([
            'name' => 'required|max:255|alpha',
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $ValidatedData['password'] = bcrypt($ValidatedData['password']);
        // $ValidatedData['password'] = Hash::make($ValidatedData['password']);

        User::create($ValidatedData);

        // session()->flash('status', 'Registration Successfully! Please Login');
        
        return redirect('/login')->with('status', 'Registration Successfully! Please Login');
    }
}
