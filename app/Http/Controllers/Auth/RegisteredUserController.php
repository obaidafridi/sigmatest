<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Utils\HelperFunctions;
use Illuminate\Support\Facades\Redirect;

class RegisteredUserController extends Controller
{
    
    public function create()
    {
        return view('frontend.auth.register');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->file('image')) {
                $filePath = 'uploads/profiles/';
                $file = $request->file('image');
                $imagename = HelperFunctions::saveFile(null, $file, $filePath);
                $image = $imagename;
            }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image'=>$image,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
