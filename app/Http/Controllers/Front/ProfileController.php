<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.Profiles.profile');
    }

    //update profile
    public function updateProfile(Request $request)
    {
        // try {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore(Auth::user()->id)],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                 $user = User::find(Auth::user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                toastSuccess('Profile successfully Updated!');
                return Redirect::back();
        // } catch (\Exception $exception) {
        //         toastError('Something went wrong, try again!');
        //         return Redirect::back();
        // }
    }
}
