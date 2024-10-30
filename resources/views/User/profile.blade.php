{{-- @extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Profile</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('User.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">

                <!-- Success Message Display -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form for updating profile -->
                <form action="{{ route('user_profile_submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Photo</label>
                            <div class="form-group">
                                @if(Auth::guard('web')->user()->photo != '')
                                    <img src="{{ asset('uploads/'.Auth::guard('web')->user()->photo) }}" alt="" class="user-photo">
                                @else
                                    <img src="{{ asset('uploads/default.png') }}" alt="" class="user-photo">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Photo</label>
                            <div class="form-group">
                                <input type="file" name="photo">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Name Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Full Name *</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ Auth::guard('web')->user()->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Email Address *</label>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" value="{{ Auth::guard('web')->user()->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Phone Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Phone *</label>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value="{{ Auth::guard('web')->user()->phone }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Country Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Country *</label>
                            <div class="form-group">
                                <input type="text" name="country" class="form-control" value="{{ Auth::guard('web')->user()->country }}">
                                @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Address *</label>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" value="{{ Auth::guard('web')->user()->address }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- State Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">State *</label>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" value="{{ Auth::guard('web')->user()->state }}">
                                @error('state')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- City Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">City *</label>
                            <div class="form-group">
                                <input type="text" name="city" class="form-control" value="{{ Auth::guard('web')->user()->city }}">
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Zip Field -->
                        <div class="col-md-6 mb-3">
                            <label for="">Zip Code *</label>
                            <div class="form-group">
                                <input type="text" name="zip" class="form-control" value="{{ Auth::guard('web')->user()->zip }}">
                                @error('zip')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Retype Password Field -->
                        <div class="col-md-6 mb-3">
                            <label for="retype_password">Retype Password</label>
                            <div class="form-group">
                                <input type="password" name="retype_password" class="form-control">
                                @error('retype_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="form_update" type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Profile</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-12">
                <div class="card shadow-sm" style="border-radius: 8px;">
                    @include('User.sidebar')
                </div>
            </div>

            <!-- Profile Form -->
            <div class="col-lg-9 col-md-12">
                <!-- Display Success or Error Messages -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <!-- Profile Update Form -->
                <form action="{{ route('user_profile_submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Display Current Photo -->
                        <div class="col-md-12 mb-3">
                            <label>Existing Photo</label>
                            <div class="form-group">
                                @if(Auth::guard('web')->user()->photo)
                                    <img src="{{ asset('uploads/'.Auth::guard('web')->user()->photo) }}" alt="User Photo" class="user-photo">
                                @else
                                    <img src="{{ asset('uploads/default.png') }}" alt="Default Photo" class="user-photo">
                                @endif
                            </div>
                        </div>

                        <!-- Change Photo -->
                        <div class="col-md-12 mb-3">
                            <label>Change Photo</label>
                            <input type="file" name="photo" class="form-control">
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Name Field -->
                        <div class="col-md-6 mb-3">
                            <label>Full Name *</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::guard('web')->user()->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="col-md-6 mb-3">
                            <label>Email Address *</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::guard('web')->user()->email }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Field -->
                        <div class="col-md-6 mb-3">
                            <label>Phone *</label>
                            <input type="text" name="phone" class="form-control" value="{{ Auth::guard('web')->user()->phone }}">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Country Field -->
                        <div class="col-md-6 mb-3">
                            <label>Country *</label>
                            <input type="text" name="country" class="form-control" value="{{ Auth::guard('web')->user()->country }}">
                            @error('country')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address Field -->
                        <div class="col-md-6 mb-3">
                            <label>Address *</label>
                            <input type="text" name="address" class="form-control" value="{{ Auth::guard('web')->user()->address }}">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- State Field -->
                        <div class="col-md-6 mb-3">
                            <label>State *</label>
                            <input type="text" name="state" class="form-control" value="{{ Auth::guard('web')->user()->state }}">
                            @error('state')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- City Field -->
                        <div class="col-md-6 mb-3">
                            <label>City *</label>
                            <input type="text" name="city" class="form-control" value="{{ Auth::guard('web')->user()->city }}">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Zip Code Field -->
                        <div class="col-md-6 mb-3">
                            <label>Zip Code *</label>
                            <input type="text" name="zip" class="form-control" value="{{ Auth::guard('web')->user()->zip }}">
                            @error('zip')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="col-md-6 mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Retype Password Field -->
                        <div class="col-md-6 mb-3">
                            <label>Retype Password</label>
                            <input type="password" name="retype_password" class="form-control">
                            @error('retype_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Update Profile">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
