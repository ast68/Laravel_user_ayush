<?php

namespace App\Http\Controllers\Auth;

use App\helpers\helper;
use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => 'required|min:12|integer',
            'description' => ['nullable', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->has('role')) {
            $user_role = Roles::where('role_slug', $request->input('role'))->first();
        }

        $user = User::create([
            'id' => helper::generateId(),
            'name' => $request->name,
            'email' => $request->email,
            'phone'=> $request->phone,
            'description'=> $request->description ?? null,
            'role_id'=> $user_role->id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}