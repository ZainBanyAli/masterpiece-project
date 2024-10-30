@extends('front.layout.master')
@section('main_content')

<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-white">Login</h2>
                <div class="breadcrumb-container d-inline-block mt-3">
                    <ol class="breadcrumb bg-transparent p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-12">
                <div class="card shadow-sm p-4">

                    {{-- Display Success Message --}}
                    {{-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

                    {{-- Display Error Message --}}
                    {{-- @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif --}}

                    <form action="{{ route('login_submit') }}" method="post" onsubmit="return validateLoginForm()">
                        @csrf
                          <!-- Store the previous URL -->
    <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" id="email" name="email" class="form-control">
                            <div class="text-danger" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <div class="text-danger" id="passwordError"></div>
                        </div>
                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary ">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="{{ route('registration') }}" class="text-primary">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateLoginForm() {
        let valid = true;

        // Clear previous errors
        document.getElementById('emailError').innerHTML = '';
        document.getElementById('passwordError').innerHTML = '';

        // Validate email
        const email = document.getElementById('email').value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            document.getElementById('emailError').innerHTML = 'Email is required';
            valid = false;
        } else if (!emailPattern.test(email)) {
            document.getElementById('emailError').innerHTML = 'Invalid email address';
            valid = false;
        }

        // Validate password
        const password = document.getElementById('password').value;
        if (password === '') {
            document.getElementById('passwordError').innerHTML = 'Password is required';
            valid = false;
        }

        return valid;
    }
</script>

@endsection
