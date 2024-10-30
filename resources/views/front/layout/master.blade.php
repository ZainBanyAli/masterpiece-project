<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Travello </title>


    <!-- All CSS -->
    <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('dist-front/css/style.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>


    <!-- Top Bar -->
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text" style=" font-size: 1.2rem;"><i class="fas fa-phone"></i> +962-222-1212</li>
                    <li class="email-text " style=" font-size: 1.2rem;"><i class="fas fa-envelope"></i> Travello@gmail.com</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">
                    <li class="menu">
                        {{-- @if(Auth::guard('web')->check())
                        <li class="menu">
                            <a href="{{ route('user_dashboard') }}"><i class="fas fa-sign-in-alt"></i> Dashboard</a>
                        </li>
                        @else
                        <a href="{{ route('login') }}" class="auth-link"><i class="fas fa-sign-in-alt"></i> Login</a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('registration') }}" class="auth-link"><i class="fas fa-user"></i> Sign Up</a>
                    </li>
                    @endif --}}

                    @if(Auth::guard('web')->check())
    <li class="menu">
        <a href="{{ route('user_dashboard') }}"  class="auth-link"><i class="fas fa-sign-in-alt"></i> Dashboard</a>
    </li>
    <li class="menu">
        <a href="{{ route('logout') }}"  class="auth-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </li>
@else
    <li class="menu">
        <a href="{{ route('login') }}" class="auth-link"><i class="fas fa-sign-in-alt"></i> Login</a>
    </li>
    <li class="menu">
        <a href="{{ route('registration') }}" class="auth-link"><i class="fas fa-user"></i> Sign Up</a>
    </li>
@endif
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .auth-link {
        font-size: 1.2rem;
    }
</style>


    <!-- Navigation -->
    @include('front.layout.nav')

    <!-- Main Content -->
    @yield('main_content')


    <!-- Footer -->
    <div class="footer pt_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_50">
                        <h2 class="heading">Important Pages</h2>
                        <ul class="useful-links">
                            <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                            <li><a href="{{ route('destinations') }}"><i class="fas fa-angle-right"></i> Destinations</a></li>
                            <li><a href="{{ route('packages') }}"><i class="fas fa-angle-right"></i> Packages</a></li>
                            <li><a href="{{ route('blog') }}"><i class="fas fa-angle-right"></i> Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_50">
                        <h2 class="heading">Useful Links</h2>
                        <ul class="useful-links">
                            <li><a href="{{ route('faq') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>
                            <li><a href="{{ route('terms') }}"><i class="fas fa-angle-right"></i> Terms of Use</a></li>
                            <li><a href="{{ route('privacy') }}"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fas fa-angle-right"></i> Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_50">
                        <h2 class="heading">Contact</h2>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="right">
                                Amman-Jordan
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="right">Travello@gmail.com</div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="right">+962-222-1212</div>
                        </div>
                        <ul class="social">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-youtube"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="item pb_50">
                        <h2 class="heading">Newsletter</h2>
                        <p>To get the latest news from our website, please subscribe here:</p>
                        <form action="{{ route('subscriber_submit') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Subscribe Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="copyright">
                        Copyright &copy; 2024, Travello. All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Top Button -->
    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    <!-- All JavaScripts -->
    <script src="{{ asset('dist-front/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/wow.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/select2.full.js') }}"></script>
    <script src="{{ asset('dist-front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/counterup.min.js') }}"></script>
    <script src="{{ asset('dist-front/js/multi-countdown.js') }}"></script>
    <script src="{{ asset('dist-front/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        // Initialize Owl Carousel
        $(document).ready(function() {
            $('.slide-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"]
            });
        });
    </script>




<script>
    $(document).ready(function(){
        $(".testimonial-carousel").owlCarousel({
            items: 1, // Show one item at a time
            loop: true, // Loop through all items
            autoplay: true, // Enable autoplay
            autoplayTimeout: 5000, // Delay between autoplay
            dots: true, // Show dots (pagination)
            nav: false // Disable navigation arrows
        });

        // Select all dots and hide the extras after the second one
        var $dots = $('.owl-dots');
        $dots.find('.owl-dot').slice(2).remove(); // Keep only the first two dots
    });
</script>

{{-- to move the photos in gallary  --}}

<script>
    $(document).ready(function() {
        $('.photo-all').magnificPopup({
            delegate: 'a.magnific', // the selector for gallery items
            type: 'image',
            gallery: {
                enabled: true // enable gallery mode
            }
        });
    });
</script>
{{-- videos in the same page "package page" --}}


<script>
    $(document).ready(function() {
        $('.video-all').magnificPopup({
            delegate: 'a.magnific-video',
            type: 'iframe',
            gallery: {
                enabled: true // Enable gallery mode
            },
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
                },
                srcAction: 'iframe_src'
            }
        });
    });
</script>
{{-- videos in the same page "destination page" --}}
<script>
    $(document).ready(function() {
        $('.video-button').magnificPopup({
            type: 'iframe',
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                    }
                }
            }
        });
    });
    </script>





@if($errors->any())
@foreach ($errors->all() as $error)
    <script>
        iziToast.show({
            message: '{{ $error }}',
            color: 'red',
            position: 'topRight',
        });
    </script>
@endforeach
@endif
@if(session('success'))
<script>
    iziToast.show({
        message: '{{ session("success") }}',
        color: 'green',
        position: 'topRight',
    });
</script>
@endif

@if(session('error'))
<script>
    iziToast.show({
        message: '{{ session("error") }}',
        color: 'red',
        position: 'topRight',
    });
</script>
@endif


</body>
</html>
