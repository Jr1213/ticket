@extends('layout.guest')
@section('content')
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
        style="background:url(../assets/images/big/auth-bg.jpg) no-repeat center center;">
        <div class="auth-box row text-center">
            <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(../assets/images/big/3.jpg);">
            </div>
            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <img src="{{ asset('assets/images/big/icon.png') }}" alt="wrapkit">
                    <h2 class="mt-3 text-center">Sign Up for Free</h2>
                    <form class="mt-4" method="POST" action="{{ route('signUp.action') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input
                                        class="form-control @error('name')
                                    is-invalid
                                    @enderror"
                                        name="name" type="text" placeholder="your name" value="{{ old('name') }}">
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input
                                        class="form-control @error('email')
                                    is-invalid
                                    @enderror"
                                        name="email" type="email" placeholder="email address"
                                        value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <input
                                        class="form-control @error('password')
                                    is-invalid
                                    @enderror"
                                        name="password" type="password" placeholder="password">
                                    <div class="invalid-feedback">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn w-100 btn-dark">Sign Up</button>
                            </div>
                            <div class="col-lg-12 text-center mt-5">
                                Already have an account? <a href="{{ route('login') }}" class="text-danger">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
@endsection
