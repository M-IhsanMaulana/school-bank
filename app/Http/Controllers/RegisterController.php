<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store_register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:7'],
        ],
        [
            'required' => 'Mohon maaf :attribute harus diisi',
            'username.unique' => 'Mohon maaf username harus berisikan karakter unik',
            'min' => 'Password harus memiliki minimal :min karakter'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect()->route('login')->with('success', 'Your account has been registered');
    }
}
