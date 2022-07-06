@extends('layouts.Front.master-auth')
@section('content')
<main>
    <div class="signUpDiv">
        <div class="leftDiv">
            <img src="{{asset('img/authLeftImg1.png')}}" alt="" class="img-fluid">
        </div>
        
        <div class="rightDiv">
            <div class="formDiv">

                <h4 class="text-center">Sign In</h4>
                <p class="text-center">Enter your email and password for signing in. </p>
                <p class="text-center">Don’t have an account? <a href="/register">Signup</a></p>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('login')}}"  method="post">
                    @csrf
                    <div class="inputDiv">
                        <x-label for="email" :value="__('Email')" />
                        <input type="email" placeholder="Enter Email Address" name="email" :value="old('email')" required autofocus>
                       
                    </div>
                    <div class="inputDiv">
                        <x-label for="password" :value="__('Password')" />
                        <input type="password" placeholder="********" name="password" required autocomplete="current-password">
                        
                    </div>
                    <div class="forgotDiv">
                        <div class="keepMeSigned">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span>Keep me signed in</span>
                        </div>
                        <span>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </span>
                    </div>
                    <button >Sign In</button>
                    <div class="socialDiv">
                        <p class="text-center">Or sign in using</p>
                        <div class="multiBtn text-center">
                            <a href="">
                                <img src="{{asset('img/googleLogo.png')}}" alt="" class="img-fluid">
                            </a>
                            <a href="">
                                <img src="{{asset('img/appleLogo.png')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection