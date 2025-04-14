<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ensure you import the User model

class UserController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Load the login Blade template
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the intended page or homepage
            return redirect()->intended('/');
        }

        // Redirect back with an error if authentication fails
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register'); // Load the registration Blade template
    }

    // Handle the registration process
    public function register(Request $request)
    {
        // Validate the registration data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the homepage or intended page
        return redirect()->intended('/');
    }

    // Handle user logout
    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect('/login'); // Redirect to the login page
    }
}