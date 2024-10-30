@extends('front.layout.master')
@section('main_content')

<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-white">Create Account</h2>
                <div class="breadcrumb-container d-inline-block mt-3">
                    <ol class="breadcrumb bg-transparent p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{route ('home') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item active text-white">Create Account</li>
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

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('registration_submit') }}" method="post" onsubmit="return validateForm()">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                            <div class="text-danger" id="nameError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}">
                            <div class="text-danger" id="emailError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <input type="password" id="password" class="form-control" name="password">
                            <div class="text-danger" id="passwordError"></div>
                        </div>
                        <div class="mb-3">
                            <label for="retype_password" class="form-label">Confirm Password *</label>
                            <input type="password" id="retype_password" class="form-control" name="retype_password">
                            <div class="text-danger" id="retypePasswordError"></div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary ">Create Account</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{route ('login') }}" class="text-primary">Existing User? Login Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function validateForm() {
        let valid = true;

        // Clear previous errors
        document.getElementById('nameError').innerHTML = '';
        document.getElementById('emailError').innerHTML = '';
        document.getElementById('passwordError').innerHTML = '';
        document.getElementById('retypePasswordError').innerHTML = '';

        // Validate name
        const name = document.getElementById('name').value;
        if (name === '') {
            document.getElementById('nameError').innerHTML = 'Name is required';
            valid = false;
        }

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
        } else if (password.length < 6) {
            document.getElementById('passwordError').innerHTML = 'Password must be at least 6 characters long';
            valid = false;
        }

        // Validate retype password
        const retypePassword = document.getElementById('retype_password').value;
        if (retypePassword === '') {
            document.getElementById('retypePasswordError').innerHTML = 'Please confirm your password';
            valid = false;
        } else if (password !== retypePassword) {
            document.getElementById('retypePasswordError').innerHTML = 'Passwords do not match';
            valid = false;
        }

        return valid;
    }
</script>

@endsection
