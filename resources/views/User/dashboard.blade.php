

@extends('front.layout.master')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
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
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-12">
                <div class="card shadow-sm" style="border-radius: 8px;">
                    @include('user.sidebar')
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-12">
                <h3 class="mb-4">Hello, {{ Auth::guard('web')->user()->name }}</h3>
                <div class="row">
                    <!-- Completed Orders Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #E0ECFF;">
                            <div class="card-body text-center">
                                <i class="fas fa-check-circle fa-2x mb-2" style="color: #6C9EFF;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_completed_orders }}</h4>
                                <p class="card-text text-muted">Completed Orders</p>
                            </div>
                        </div>
                    </div>
                    <!-- Pending Orders Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #FFD1D1;">
                            <div class="card-body text-center">
                                <i class="fas fa-clock fa-2x mb-2" style="color: #FF6B6B;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_pending_orders }}</h4>
                                <p class="card-text text-muted">Pending Orders</p>
                            </div>
                        </div>
                    </div>
                    <!-- Total Bookings Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #F5F9FF;">
                            <div class="card-body text-center">
                                <i class="fas fa-book fa-2x mb-2" style="color: #4B83FF;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_bookings }}</h4>
                                <p class="card-text text-muted">Total Bookings</p>
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #E7F3FF;">
                            <div class="card-body text-center">
                                <i class="fas fa-heart fa-2x mb-2" style="color: #6CB8FF;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_wishlist }}</h4>
                                <p class="card-text text-muted">Wishlist Items</p>
                            </div>
                        </div>
                    </div>
                    <!-- Messages Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #FFF7E6;">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope fa-2x mb-2" style="color: #FFB347;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_messages }}</h4>
                                <p class="card-text text-muted">Messages</p>
                            </div>
                        </div>
                    </div>
                    <!-- Reviews Card -->
                    <div class="col-md-4">
                        <div class="card mb-3 shadow-sm" style="border-radius: 8px; background-color: #E0F7E9;">
                            <div class="card-body text-center">
                                <i class="fas fa-star fa-2x mb-2" style="color: #4CAF50;"></i>
                                <h4 class="card-title display-4 font-weight-bold">{{ $total_reviews }}</h4>
                                <p class="card-text text-muted">Reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    /* Card Hover Effect */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    /* Responsive Design */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 1.5rem;
        }
    }
</style>
