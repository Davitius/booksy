<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Davitius">
    <link rel="icon" type="image/png+xml" href="/img/Logo.png"/>
    <title>დაჯავშნე</title>


    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- სლაიდერი მენიუ CSS  -->
    <link rel="stylesheet" href="css/servicemenu.css">

    <!-- Foto Flipster -->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!--სვაიპერი საუკეტესოები-->
    <!-- ===== Link Swiper's CSS ===== -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="css/swiper.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap  კარუსელი-->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    {{--  Foto Flipster  --}}
    <script src="js/jquery.flipster.min.js"></script>
    <link rel="stylesheet" href="css/jquery.flipster.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAvesome -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="plugins/fullcalendar/main.css">

</head>
<body>
<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #213e4b">
        <div class="container-fluid" id="Headeri">
            <a class="navbar-brand" href="{{'/'}}">
                <img src="{{asset('img/Logo.png')}}" class="LogoImg" id="LogoImg">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse" >
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href={{route('/')}}>მთავარი</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('/')}}">ჩვენს შესახებ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('/')}}">კონტაქტი</a>
                    </li>
                </ul>
                <form method="get" action="{{route('search')}}" class="d-flex" role="search"
                      style="margin-right: 3em;">
                    <input class="form-control me-2" id="Search" name="Search" type="search"
                           placeholder="ძებნა" aria-label="Search">
                    <button class="searchBtn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
                @if (Route::has('login'))
                    @auth
                        <div class="dropdown" id="UserDropdown">
                            <a href="#"
                               class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->photo != '')
                                    <img src="../../storage/{{Auth::user()->photo}}" alt="User Avatar" class="rounded-circle">
                                @else
                                    <img src="{{asset('img/DefaultAvatar.png')}}" alt="Default User Avatar" class="rounded-circle">
                                @endif
                                <strong>{{ Auth::user()->name }}</strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                style="background-color: #213e4b">
                                @can('view', auth()->user())
                                    <li><a class="dropdown-item" href="{{route('AdminPanel')}}">ადმინ-პანელი</a>
                                    </li>
                                @endcan
                                <li><a class="dropdown-item" href="{{route('UserProfile')}}">პირადი კაბინეტი</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('გასვლა') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="btn-group" id="reg-login-btns">
                        </div>

                        <a href="{{ route('login') }}" class="menu_link">
                            <button type="button" class="authReg">ავტორიზაცია</button>
                        </a>
                        <a href="{{ route('register') }}" class="menu_link">
                            <button type="button" class="authReg">რეგისტრაცია</button>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>


{{-- კონტენტი --}}
@yield('content')

{{-- Footer-ი --}}
<footer class="py-3">
    <ul class="nav justify-content-center pb-3 mb-3">
        <li class="nav-item"><a href="{{'/'}}" class="footertext">მთავარი</a></li>
        <li class="nav-item"><a href="{{'home'}}" class="footertext">ჩვენს შესახებ</a></li>
        <li class="nav-item"><a href="{{'home'}}" class="footertext">კონტაქტი</a></li>
    </ul>
    <p class="text-center copyright">© 2022 Davitius</p>
</footer>

<!-- FullCalendar Locale GE -->
{{--<script src="js/fc/ru.js"></script>--}}

<script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>
<script src="js/city.js"></script>
<!-- Initialize Swiper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>

<script>
    if (matchMedia) {
        var screen = window.matchMedia("(max-width:1000px)");
        screen.addListener(changes);
        changes(screen);
    }

    function changes(screen) {
        if (screen.matches) {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        } else {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    }
</script>
</body>
</html>
