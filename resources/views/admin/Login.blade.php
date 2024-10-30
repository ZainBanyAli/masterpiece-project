{{-- @extends('admin.layout.master')
@section('main_content')

<section class="section">
    <div class="container container-login">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary border-box">
                    <div class="card-header card-header-auth">
                        <h4 class="text-center">Admin Panel Login</h4>
                    </div>
                    <div class="card-body card-body-auth">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin_login_submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                    Login
                                </button>
                            </div>
                            <div class="form-group">
                                <div>
                                    <a href="{{ route('admin_forget_password') }}">
                                        Forget Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}

@extends('admin.layout.master')
@section('main_content')

<section class="section d-flex align-items-center vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6"> <!-- Increased column size -->
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary text-white py-4">
                        <h3 class="mb-0">Admin Panel Login</h3>
                    </div>
                    <div class="card-body p-5">

                        <!-- Success and Error Messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('admin_login_submit') }}">
                            @csrf
                            <!-- Email Input -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Password Input -->
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>

                            <!-- Forgot Password -->
                            <div class="text-center">
                                <a href="{{ route('admin_forget_password') }}" class="text-muted">Forgot Password?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
