<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20', 'unique:users'], // Ensure phone number is validated
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, // Ensure phone number is included
            'privilege' => 'user', // Default privilege
            'password' => Hash::make($request->password),
            'profile_photo' => 'imgs/default-avatar.jpg', // Default profile photo path
        ]);
    
        event(new Registered($user));
        Auth::login($user);
    
        return redirect()->route('home');
    

    event(new Registered($user));

    Auth::login($user);

    return redirect('/home');
}
}    
