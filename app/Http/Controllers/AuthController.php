<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view ('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password)
        ]);

        //login
        Auth::login($user);


        return redirect(route('books.index'));
        // return redirect()->route('books.index');
    }


    public function login()
    {
        return view ('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        $is_login = Auth::attempt(['email' =>$request->email, 'password' => $request->password]);
        if(! $is_login)
        {
            return back();
        }

        return redirect(route('books.index'));
        // return redirect()->route('books.index');
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
