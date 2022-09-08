<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نفشه برنامه درسی</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fonts/icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    @livewireStyles
</head>

<body>
<div class="overlay"></div>
<header class="header">
    <div class="TopBar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="top-contact">
                        <a href="{{route('login')}}" class="btn "><img src="{{asset('assets/img/login.png')}}"
                                                                       alt=""><span>ورود به
									سایت</span></a>
                        <a href="{{route('register')}}" class="btn "><img src="{{asset('assets/img/profile-add.svg')}}"
                                                                          alt=""></i><span>ثبت نام در
									سایت</span></a>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{asset('assets/img/logo.svg')}}" alt="">
                </div>
                <div class="col-md-4 text-left">
                    <a href="#" class="btn font-light">مشاهده سایر پست ها</a>
                    <a href="#" class="btn btn-default2 font-light">صفحه شخصی</a>
                </div>
            </div>
        </div>
    </div>
    <div class="StickyNav" id="fixmenu">
        <div class="container">
            <div class="sidebar">
                <div class="hideSidebar"><i class="fa fa-close"></i></div>
                <ul class="nav res-menu">
                    <li><a href="#" class="active"> خانه</a></li>
                    <li><a href="#"> آشنایی </a></li>
                    <li><a href="#">شناخت نقشه برداری</a></li>
                    <li><a href="#">نقشه ضروری مدارس </a></li>
                    <li><a href="#">نقشه های اجماع </a></li>

                </ul>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <button class="triggerSidebar btn"><i class="fa fa-bars"></i></button>
                <ul class=" top-menu">
                    <li><a href="#" class="active"> خانه</a></li>
                    <li><a href="#"> آشنایی <i class="fa fa-chevron-down"></i></a></li>
                    <li><a href="#">شناخت نقشه برداری<i class="fa fa-chevron-down"></i></a></li>
                    <li><a href="#">نقشه ضروری مدارس <i class="fa fa-chevron-down"></i></a></li>
                    <li><a href="#">نقشه های اجماع <i class="fa fa-chevron-down"></i></a></li>

                </ul>
                <form class="navbar-form navbar-right">
                    <input type="text" placeholder="جستجو کنید...." class="form-control">
                    <button class="search-btn"><img src="{{asset('assets/img/search-normal.svg')}}" alt=""></button>
                </form>
            </div>
        </div>

    </div>
</header>
<section class="top-slider">
    <div class="lazy slider" data-sizes="100vw" dir="ltr">
        <div class="position-relative" dir="rtl">
            <img src="{{asset('assets/img/Rectangle 3.png')}}" alt="">
        </div>
        <div class="position-relative" dir="rtl">
            <img src="{{asset('assets/img/Rectangle 3.png')}}" alt="">
        </div>
    </div>
</section>

<div class="mycontent">
   @yield('content')
</div>

<footer>
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 FooterPane1">
                    <div class="title">
                        <img src="{{asset('/assets/img/logo-green.svg')}}" alt="">
                    </div>
                    <p>دراینجا توضیحی درباره سایت و حوزه فعالیت سایت نوشته می شود این متن می تواند در حدود 5 خط باشد
                        دراینجا توضیحی درباره سایت و حوزه فعالیت سایت نوشته می شود این متن می تواند در حدود 5 خط
                        باشد دراینجا توضیحی درباره سایت و حوزه فعالیت سایت </p>
                </div>
                <div class="col-lg-5 col-md-7 FooterPane2 d-flex">
                    <div class="flex-grow-1">
                        <div class="title">لینک های اصلی</div>
                        <ul class="contentpane">
                            <li><a href="#">خانه </a></li>
                            <li><a href="#">آشنایی</a></li>
                            <li><a href="#">شناخت نقشه برداری</a></li>
                            <li><a href="#">نقشه ضروری مدارس </a></li>
                            <li><a href="#">نقشه های اجماع </a></li>
                        </ul>
                    </div>
                    <div class="flex-grow-1">
                        <div class="title">لینک های مفید</div>
                        <ul class="contentpane">
                            <li><a href="#">درباره ما </a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">سوالات متداول</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 FooterPane3">
                    <div class="title">تماس با ما</div>
                    <div class="contentpane">
                        <ul>
                            <li>
                                <strong>تلفن تماس: </strong>
                                <span>06347657634</span>
                            </li>
                            <li>
                                <strong>ایمیل:</strong> maping@gmail.com
                            </li>
                            {{--                            <li>--}}
                            {{--                                <strong>دورنما: </strong><a href="#">maping</a>--}}
                            {{--                            </li>--}}
                            <li><strong>آدرس: </strong>
                                <a href="#">بیرجند، خیابان غفاری، انتهای غفاری ، جنب پارک علم و فناوری</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="copyright-box">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p>طراحی و توسعه محمدجواد صیدی</p>
                </div>
                <div class="col-lg-6">
                    <ul class="follow-us">
                        <li><a href="#">
                                <img src="{{asset('/assets/img/telegram.svg')}}" alt="">
                            </a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('/assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('/assets/js/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('/assets/js/script.js')}}" type="text/javascript"></script>
@livewireScripts

</body>

</html>
