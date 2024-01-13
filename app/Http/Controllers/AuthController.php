<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function store(Request $request)
	{
		$user = new User();
		$user->email = $request['email'];
		$user->name = $request['name'];
		$user->password = bcrypt($request['password']);
		$user->save();
		return redirect()->route('home');
	}
	public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
	public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
