@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <!-- Total Sliders -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-primary">
                        <i class="far fa-images"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Sliders</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_slider }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Testimonials -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-danger">
                        <i class="far fa-comment-dots"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Testimonials</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_testimonial }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Team Members -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Team Members</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_team_members }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Posts -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-success">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Posts</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_posts }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Destinations -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Destinations</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_destinations }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Packages -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Packages</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_packages }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Users -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Users</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_users }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Subscribers -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Subscribers</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_subscribers }}
                        </div>
                    </div>
                </div>
            </div>
               <!-- Total Tours -->
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); border-radius: 10px;">
        <div class="card-icon bg-primary">
            <i class="fas fa-globe-americas"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>Total Tours</h4>
            </div>
            <div class="card-body">
                {{ $total_tours }}
            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
