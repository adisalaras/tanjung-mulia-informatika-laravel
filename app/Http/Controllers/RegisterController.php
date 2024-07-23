<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // public function create(): View
    // {
    //     return view('auth.register');
    // }

    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'nama' => ['required','string','max:255'],
    //         'email' => ['required','string', 'lowercase','email' ,'max:255', 'unique:'.User::class],
    //         'password'=>['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user->notify(new WelcomeEmailNotification($user));

    //     event(new Registered($user));

    //     Auth::login($user);
    // }
}
