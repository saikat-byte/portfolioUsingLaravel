<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand logo" href="{{ route('home') }}">
            <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('services') ? "active" : "" }}" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('portfolios') ? "active" : "" }}" href="{{ route('portfolios') }}">Portfolios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? "active" : "" }}" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>