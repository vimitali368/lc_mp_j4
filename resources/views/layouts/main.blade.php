<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Журналистское агентство "Воко"</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .container {
            max-width: 800px;
        }

        .reload {
            font-family: Lucida Sans Unicode
        }
    </style>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ asset('/') }}">B<i class="fas fa-eye"></i>KO</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('article.index') }}">Статьи</a>
                    </li>
                    {{--                    <li class="nav-item ">--}}
                    {{--                        <a class="nav-link" href="{{ route('category.index') }}">Категории</a>--}}
                    {{--                    </li>--}}
                    @auth()
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('personal.main.index') }}">Личный кабинет</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('admin') }}">Платформа "Воко"</a>
                        </li>
                    @endauth
                    @guest()
                        <li class="nav-item ">
                            <a class="nav-link" href="/login">Войти</a>
                        </li>
                    @endguest
                    @guest()
                        <li class="nav-item ">
                            <a class="nav-link" href="/register">Регистрация</a>
                        </li>
                    @endguest
                    @auth()
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input class="btn nav-link" type="submit" value="Выйти">
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>
@yield('content')
<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-4">
                <a href="{{ asset('/') }}" class="footer-brand-wrapper">
                    BOKO
                </a>
                <p class="contact-details">hello@voco.loc</p>
                <p class="contact-details">+7 999 77 000 00</p>
            </div>
        </div>
        <div class="footer-bottom-content">
            <p class="mb-0">© Воко. 2022. Все права защищены.</p>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script type="text/javascript">
    AOS.init({
        duration: 1000
    });
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'comment-reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</body>

</html>
