<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Register",
            "active" => "register"
        ]);
    }
    public function store(Request $request)
    {
        $dindan = $request->validate([
            'name' => 'required|max:225',
            'username' => ['required', 'min:5', 'max:225', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:225'
        ]);

        $dindan['password'] = Hash::make($dindan['password']);

        User::create($dindan);
        // $request->session()->flash('success', 'Registrasi Berhasil Silahkan Login');
        return redirect('/login')->with('success', 'Registrasi Berhasil Silahkan Login');
    }
}
