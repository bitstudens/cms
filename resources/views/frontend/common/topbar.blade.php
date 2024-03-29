<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#">{{ \Carbon\Carbon::parse(now())->format('D, M d, Y') }}</a>
                    </li>

                    @if (!Auth::check())

                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{ route('frontend.register') }}">Register</a>
                    </li>
                    @endif
                    @if (Auth::check())
                    <li class="nav-item nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#"> Welcome, {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="{{ route('logout') }}">Logout</a>
                    </li>


                    @endif



                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <li class="nav-item">
                        <a class="nav-link text-body" href=""><small class="fab fa-twitter"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="{{ \App\Utils\SettingUtils::get('system_facebook') }}"><small class="fab fa-facebook-f"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href={{ \App\Utils\SettingUtils::get('system_insta') }}><small class="fab fa-instagram"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="{{ url('/') }}" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary"><span class="text-secondary font-weight-normal">{{ \App\Utils\SettingUtils::get('system_name') }}</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <a href="{{ url('/') }}"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
        </div>
    </div>
</div>
