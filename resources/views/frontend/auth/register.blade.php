@extends('layouts.Front.master-auth')
@section('content')
<main>
    <div class="signUpDiv">
        <div class="leftDiv">
            <img src="{{asset('img/authLeftImg1.png')}}" alt="" class="img-fluid">
        </div>
        <div class="rightDiv">
            <div class="formDiv">
                <h4 class="text-center">Sign Up</h4>
                <p class="text-center">Enter your email and password for signing in. </p>
                <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="inputDiv">
                        <x-label for="name" :value="__('Name')" />
                        <input type="text" placeholder="Enter Your Name" type="text" name="name" value="{{old('name')}}" required autofocus>
                    </div>
                    <div class="inputDiv">
                        <x-label for="email" :value="__('Email')" />
                        <input type="email" placeholder="Enter Your Email"  name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="inputDiv">
                        <x-label for="image" :value="__('Image')" />
                        <input type="file" placeholder="Enter Your Email"  name="image" value="{{old('image')}}" required>
                    </div>
                    <div class="inputDiv">
                        <x-label for="password" :value="__('Password')" />
                        <input type="password" placeholder="********" name="password" required autocomplete="new-password">
                    </div>
                    <div class="inputDiv">
                        <label for="">Confirm Password</label>
                        <input type="password" placeholder="********" name="password_confirmation" required>
                    </div>
                    <button>Sign Up</button>
                    <div class="socialDiv">
                        <p class="text-center">Or sign up using</p>
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