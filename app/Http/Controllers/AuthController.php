<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function signuppost()
    {
        $data = request()->validate(
            [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'email' => ['required','email'],
                'phonenumber' => ['nullable'],
                'date_of_birth' => ['nullable'],
                'password' => ['required', 'same:password_confirm'],
            ]
            );
        $data['password'] = Hash::make($data["password"]);

        $user = User::create($data);
        if(Auth::attempt($user->only('email', 'password')))
        {
            return redirect()->route('home.index');
        }
        else
        {      
            return redirect()->route('create');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginpost(Request $request)
{
    // Validate login request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($request->only('email', 'password'))) {
        // If login is successful, redirect to intended page
        return redirect()->intended('/');
    }

    // If login fails, redirect back to login page with error message
    return redirect('auth/login')->withErrors([
        'email' => 'Wachtwoord en email adress komen niet overeen.',
    ]);
}

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function resetPWView()
    {
        return view('auth.resetPassword');
    }

    public function sendEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? redirect()->route('index')->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
}

