<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(auth()->user()->email == "admin@admin.com"){
                return redirect('/admin');
            }
            return redirect()->route('products.index');
        }

        return back()->withErrors(['email' => "L'adresse e-mail ou le mot de passe est incorrect."]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
