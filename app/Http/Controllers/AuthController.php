<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']            
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('tarefas.index');
    }

    return back()->with('error', 'Email ou senha incorretos');
    }

    public function showRegister()
    {
        return view('auth.cadastrar');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user = User::where('email', $request->email)->first());
        return redirect()->route('tarefas.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
