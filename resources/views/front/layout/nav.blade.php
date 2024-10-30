<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <span class="logo-text">Travello</span>
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="logo-text">Travello</span>
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ Route::is('about') ? 'active' : '' }}">
                            <a href="{{ route('about') }}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('destinations') }}" class="nav-link">Destinations</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('packages') }}" class="nav-link">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('team_members') }}" class="nav-link">Team</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<style>
    .logo-text {
        font-size: 1.8rem;
        font-weight: bold;
        color: #007bff; /* Set the logo text color to blue */
        font-family: Arial, sans-serif;
    }
</style>
