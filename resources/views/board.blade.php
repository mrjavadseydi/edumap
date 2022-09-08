@extends('layouts.master')
@section('content')
    <div class="pb-130 pt-45">

        <div class="container">

            <div class="head-box">
                <div class="title-head">افزودن نوشته</div>
                <div class="head-line" id="main"></div>
            </div>
            <section class="add-text-box">
                @if(session()->has('message'))

                    <div class="alert alert-{{session('message')['type']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('message')['message']}}
                    </div>

                @endif
                <form action="{{route('board.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="usr">عنوان <span class="nessery">*</span></label>
                                <input type="text" class="form-control" id="usr" name="title" placeholder="مثال: کارتیمی ">
                            </div>
                            <div class="form-group">
                                <label for="usr">ایده و نظر <span class="nessery">*</span></label>
                                <textarea class="form-control" name="body" id="" cols="30" rows="10"
                                          placeholder="ایده و نظر خود را درباره عنوان درس مورد نظر وارد کنید"></textarea>
                            </div>
                            @livewire('board-info')
                        </div>
                        <div class="col-lg-4">
                            <div class="drop-zone">
						<label class="drop-zone__prompt" for="file">

							<img src="{{asset('assets/img/folder 1.svg')}}" class="img-fluid" alt="">
							<p class="font-size-16 dark-color mt-2" id="file_lable">فایل پیوست خود جهت بارگذاری در اینجا رها کنید و یا
								<a class="first-color">کلیک کنید</a></p>
							<p class="font-size-14 dark-gray mt-2">فرمت قابل قبول JPG,PNG,RAR,ZIP,PDF می باشد و حداکثر حجم
								فایل 10MB
								است</p>
						</label>
                                <input type="file" id="file" onchange="document.getElementById('file_lable').innerText='فایل انتخاب شد'" name="file" class="drop-zone__input">
                            </div>

                        </div>
                        <div class="form-group col-12">
                            <label for="usr2">کلمات کلیدی(با فاصله {اسپیس} جدا کنید) </label>
                            <textarea class="form-control" name="keywords" id="usr2" cols="30" rows="3"
                                      placeholder="مثال:ریاضی تکالیف مشکل"></textarea>
                        </div>
                        <div class="text-left col-lg-12 mt-3">
                            <button class="btn btn-default2">ارسال و ثبت نظر</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
