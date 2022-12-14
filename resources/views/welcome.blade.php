@extends('layouts.master')
@section('content')

    <div class="container">
        @livewire('personal.index')
    </div>

    <div class="counter-sec">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-3 col-6">
                    <div class="count-box">
                        <div class="count-text">
                            <span><i class="fa fa-plus"></i></span>
                            <div class="count d-inline-block">121</div>
                        </div>
                        <h5>نقشه های آموزشی </h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="count-box">
                        <div class="count-text">
                            <span><i class="fa fa-plus"></i></span>
                            <div class="count d-inline-block">121</div>
                        </div>
                        <h5>دروس و اهداف</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="count-box">
                        <div class="count-text">
                            <span><i class="fa fa-plus"></i></span>
                            <div class="count d-inline-block">121</div>
                        </div>
                        <h5>معلم و استاد</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="count-box">
                        <div class="count-text">
                            <span><i class="fa fa-plus"></i></span>
                            <div class="count d-inline-block">121</div>
                        </div>
                        <h5>دانش آموز های فعال</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mycontent">
        <div class="container">
            <section class="lesson-plan">
                <div class="head-box">
                    <div class="title-head">شناخت نقشه برداری برنامه دروس</div>
                    <div class="head-line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="lesson-item">
                            <div class="img-box  d-flex align-content-center text-center m-auto">
                                <img src="{{asset('assets/img/map-location 1.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="content-box">
                                <h3><a href="#">چرخه نقشه برداری</a></h3>
                                <p>زمان در این نقشه ها عنصر بسیار مهم است و نیاز است معلمان در زمان های مشخص به ثبت
                                    دانش
                                    خود
                                    بپردازند ولی حتما ماهانه جلسه نمایندگان معلم تشکیل می شود .پس نیاز به وقت اختصاص
                                    یافته
                                    دا
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="lesson-item">
                            <div class="img-box  d-flex align-content-center text-center m-auto">
                                <img src="{{asset('assets/img/map-location 1.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="content-box">
                                <h3><a href="#">تصویر سازی هوشمند</a></h3>
                                <p>نقشه های ذهنی معلمان در این سامانه به گونه ای طراحی می شود که در قالب نقشه های
                                    الکترونیک
                                    در
                                    یک نگاه قابلیت دیدن داشته باشد و حشو و مطالب اضافی خودداری می کند. و مانند
                                    درختچه ای
                                    دانش و
                                    تجارب خاص معلم را فیلتر می کند.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="lesson-item">
                            <div class="img-box  d-flex align-content-center text-center m-auto">
                                <img src="{{asset('assets/img/map-location 1.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="content-box">
                                <h3><a href="#">هدف</a></h3>
                                <p>هدف از ایجاد سامانه نقشه برداری برنامه درسی، ثبت و ذخیره دانش و تجارب هر معلم و
                                    ایجاد
                                    گفتگو و
                                    نظر در مورد تجارب معلمان و اشتراک دانش و رسیدن به یکپارچگی، ساختارمند نمودن دانش
                                    و
                                    همپوشانی
                                    آنچه درکلاس های درس اتفاق می افتد در جهت بالا بردن و توسعه حرفه ای معلمان .
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="lesson-item">
                            <div class="img-box d-flex align-content-center text-center m-auto">
                                <img src="{{asset('assets/img/map-location 1.png')}}" alt="" class="img-fluid mx-auto">
                            </div>
                            <div class="content-box">
                                <h3><a href="#">سامانه</a></h3>
                                <p>این سامانه از سه قست عمده تشکیل شده 1- قسمتی برای ثبت اطلاعات به نام خود معلم
                                    (نقشه
                                    فردی
                                    معلم)، 2- قسمتی برای ثبت اطلاعات نماینده هر پایه در هر مدرسه (نقشه اجماع) و 3-
                                    قسمتی
                                    برای
                                    ثبت گزارشات مدیران مدارس ( نقشه ضروری) .
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
