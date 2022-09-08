<div>
    @if(session()->has('message'))

        <div class="alert alert-{{session('message')['type']}}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('message')['message']}}
        </div>

    @endif
    <section class="individual-role">
        <div class="head-box">
            <div class="title-head">نقش فردی معلم</div>
            <div class="head-line"></div>
        </div>
        <div class="">
            <div class="form-box">
                <div class="select-role-box">
                    @foreach($books as $book)
                        <div class="custom-control custom-radio">

                            <input type="radio" class="custom-control-input" wire:change="updateSeasons"
                                   wire:model="book_id" id="customRadio{{$book->id}}" name="example"
                                   value="{{$book->id}}">
                            <label for="customRadio{{$book->id}}" class="selected-lable">
                                <img src="{{asset('uploads/'.$book->image)}}" class="img-fluid" alt="">
                            </label>
                            <label class="custom-control-label" for="customRadio">{{$book->title}}</label>
                        </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="user">نام فصل کتاب </label>
                        <select name="cars" class="custom-select" id="user" wire:model="season_id"
                                wire:change="updateTopics">
                            <option selected>انتخاب کنید</option>
                            @foreach($seasons as $season)
                                <option value="{{$season->id}}">{{$season->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="usr">موضوع نظر </label>
                        <select name="cars" class="custom-select" id="usr" wire:change="updateComments"
                                wire:model="topic_id">
                            <option selected>انتخاب کنید</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}">{{$topic->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-left">
                    @auth
                        @if($add_comment)
                            <button class="btn btn-default2" data-toggle="modal" data-target="#exampleModal"
                                    wire:click="initComment">
                               ارسال و ثبت نظر
                            </button>
                        @endif

                    @endauth
                    @guest
                        <a class="btn btn-default2" href="{{route('login')}}">برای ثبت نظر وارد شوید
                        </a>
                    @endguest
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="position-relative">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="head-box">
                                    <div class="title-head">ثبت نظر</div>
                                    <div class="head-line"></div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('comment.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="usr">نام و نام خانوادگی </label>
                                                <input type="text" value="{{auth()->user()->name??''}}" disabled class="form-control" id="usr"
                                                       placeholder="مثال: الهه لطفی ">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr1">ایمیل </label>
                                                <input type="email" value="{{auth()->user()->email??''}}" disabled  class="form-control" id="usr1"
                                                       placeholder="مثال: elahelotfi@gmal.com ">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr2">کلمات کلیدی(با فاصله {اسپیس} جدا کنید) </label>
                                                <textarea class="form-control" name="keywords" id="usr2" cols="30" rows="3"
                                                          placeholder="مثال:ریاضی تکالیف مشکل"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="commentable_id" value="{{$commentable_id}}">
                                        <input type="hidden" name="commentable_type" value="{{$commentable}}">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="usr">ایده و نظر </label>
                                                <textarea class="form-control" name="body" id="usr3" cols="30" rows="10"
                                                          placeholder="ایده و نظر خود را درباره عنوان درس مورد نظر وارد کنید"></textarea>
                                            </div>
                                        </div>
                                                                                <div class="col-12">
                                                                                    <div
                                                                                        class="d-flex align-items-center justify-content-between flex-wrap">
{{--                                                                                        <div class="">--}}
{{--                                                                                            <div class="custom-file" style="width: 80px">--}}
{{--                                                                                                <input type="file"--}}
{{--                                                                                                       class="custom-file-input position-absolute"--}}
{{--                                                                                                       id="customFile" name="filename">--}}
{{--                                                                                                <label class=" btn btn-border mb-0" for="customFile">آپلود--}}
{{--                                                                                                    فایل </label>--}}
{{--                                                                                            </div>--}}
{{--                                                                                            <span class="font-size-12 font-light">حجم فایل حداکثر300MB باشد--}}
{{--                                        															و نوع فرمت فایل تنها JPG-PNG-RAR--}}
{{--                                        															قابل قبول می باشد.</span>--}}
{{--                                                                                        </div>--}}
                                                                                        <button class="btn btn-default2 mt-0" type="submit">ارسال و ثبت
                                                                                            نظر
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($comments!=null)

        <section class="other-suggestion">
            <div class="head-box">
                <div class="title-head">
                    <span>پیشنهاد دیگر معلمان</span>
                </div>
                <div class="head-line"></div>
            </div>
            <div class="d-flex justify-content-between flex-wrap">
                <div class="count-suggestion">{{count($comments)}} پیشنهاد ثبت شده</div>
                {{--            @if(count($comments)>3)--}}
                {{--                --}}
                {{--            @endif--}}
                {{--            <div class="prev-next-btn">--}}
                {{--                <button class="btn">قبلی</button>--}}
                {{--                <button class="btn">بعدی</button>--}}
                {{--            </div>--}}
            </div>
            <div id="comment-list">
                <ul>
                    @foreach($comments as $comment)
                        @livewire('personal.comment',['comment'=>$comment],key($comment->id))
                    @endforeach
                    {{--                <li>--}}
                    {{--                    <div class="comment_item">--}}
                    {{--                        <div class="name-commenter">--}}
                    {{--                            <img src="{{asset('assets/img/user.png')}}" alt="" class="img-fluid">--}}
                    {{--                            <span class="mx-2">احمد عزیزی</span>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="comment-box">--}}
                    {{--                            <div class="">--}}
                    {{--                                <p>--}}
                    {{--                                    در اینجا متن نظر معلم نوشته می شود این متن می تواند در حدود 7 خط باشد--}}
                    {{--                                    در--}}
                    {{--                                    صورتی که متن معلم بیشتر از7خط بود سه نقطه می خورد و کاربر می تواند برروی--}}
                    {{--                                    مشاهده--}}
                    {{--                                    بیشتر کلیک کند. که در این صورت متن به صورت مودال باز شده و متن کامل نمایش--}}
                    {{--                                    داده--}}
                    {{--                                    می--}}
                    {{--                                    شود و یا متن به صورت کامل در همین جا نمایش داده می شود. در اینجا متن نظر--}}
                    {{--                                    معلم--}}
                    {{--                                    نوشته--}}
                    {{--                                    می شود این متن می تواند در حدود7 خط باشد در صورتی که متن معلم بیشتر از7خط--}}
                    {{--                                    بود سه--}}
                    {{--                                    نقطه می خورد و کاربر می تواند برروی مشاهده بیشتر کلیک کند.--}}
                    {{--                                </p>--}}
                    {{--                                <div class="text-left">--}}
                    {{--                                    <button class="btn btn-reply">--}}
                    {{--                                        پاسخ به این پیشنهاد--}}
                    {{--                                        <img src="{{asset('assets/img/repeat.svg')}}" alt="">--}}
                    {{--                                    </button>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="comment_item_reply background-reply">--}}
                    {{--                                <div class="name-commenter">--}}
                    {{--                                    <img src="{{asset('assets/img/user.png')}}" alt="" class="img-fluid">--}}
                    {{--                                    <span class="mx-2">احمد عزیزی</span>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="comment-box">--}}
                    {{--                                    <div class="">--}}
                    {{--                                        <p>--}}
                    {{--                                            در اینجا متن نظر معلم نوشته می شود این متن می تواند در حدود 7 خط--}}
                    {{--                                            باشد--}}
                    {{--                                            در--}}
                    {{--                                            صورتی که متن معلم بیشتر از7خط بود سه نقطه می خورد و کاربر می تواند--}}
                    {{--                                            برروی--}}
                    {{--                                            مشاهده--}}
                    {{--                                            بیشتر کلیک کند. که در این صورت متن به صورت مودال باز شده و متن کامل--}}
                    {{--                                            نمایش--}}
                    {{--                                            داده--}}
                    {{--                                            می--}}
                    {{--                                            شود و یا متن به صورت کامل در همین جا نمایش داده می شود. در اینجا متن--}}
                    {{--                                            نظر--}}
                    {{--                                            معلم--}}
                    {{--                                            نوشته--}}
                    {{--                                            می شود این متن می تواند در حدود7 خط باشد در صورتی که متن معلم بیشتر--}}
                    {{--                                            از7خط--}}
                    {{--                                            بود سه--}}
                    {{--                                            نقطه می خورد و کاربر می تواند برروی مشاهده بیشتر کلیک کند.--}}
                    {{--                                        </p>--}}
                    {{--                                        <div class="text-left">--}}
                    {{--                                            <button class="btn btn-reply">--}}
                    {{--                                                پاسخ به این پیشنهاد--}}
                    {{--                                                <img src="{{asset('assets/img/repeat.svg')}}" alt="">--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="d-flex justify-content-between bottom-box flex-wrap">--}}
                    {{--                                        <p>انتشار: 20 خرداد 1400</p>--}}
                    {{--                                        <div class="accept-comment d-flex align-items-center">--}}
                    {{--                                            <p>آیا این پیشنهاد را قبول دارید؟</p>--}}
                    {{--                                            <button class="btn">3<img src="{{asset('assets/img/like.svg')}}"--}}
                    {{--                                                                      alt=""></button>--}}
                    {{--                                            <button class="btn"><img src="{{asset('assets/img/dislike.svg')}}"--}}
                    {{--                                                                     alt="">0--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="comment_item_reply">--}}
                    {{--                                <div class="name-commenter">--}}
                    {{--                                    <img src="{{asset('assets/img/user.png')}}" alt="" class="img-fluid">--}}
                    {{--                                    <span class="mx-2">احمد عزیزی</span>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="comment-box">--}}
                    {{--                                    <div class="">--}}
                    {{--                                        <p>--}}
                    {{--                                            در اینجا متن نظر معلم نوشته می شود این متن می تواند در حدود 7 خط--}}
                    {{--                                            باشد--}}
                    {{--                                            در--}}
                    {{--                                            صورتی که متن معلم بیشتر از7خط بود سه نقطه می خورد و کاربر می تواند--}}
                    {{--                                            برروی--}}
                    {{--                                            مشاهده--}}
                    {{--                                            بیشتر کلیک کند. که در این صورت متن به صورت مودال باز شده و متن کامل--}}
                    {{--                                            نمایش--}}
                    {{--                                            داده--}}
                    {{--                                            می--}}
                    {{--                                            شود و یا متن به صورت کامل در همین جا نمایش داده می شود. در اینجا متن--}}
                    {{--                                            نظر--}}
                    {{--                                            معلم--}}
                    {{--                                            نوشته--}}
                    {{--                                            می شود این متن می تواند در حدود7 خط باشد در صورتی که متن معلم بیشتر--}}
                    {{--                                            از7خط--}}
                    {{--                                            بود سه--}}
                    {{--                                            نقطه می خورد و کاربر می تواند برروی مشاهده بیشتر کلیک کند.--}}
                    {{--                                        </p>--}}
                    {{--                                        <div class="text-left">--}}
                    {{--                                            <button class="btn btn-reply">--}}
                    {{--                                                پاسخ به این پیشنهاد--}}
                    {{--                                                <img src="{{asset('assets/img/repeat.svg')}}" alt="">--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="d-flex justify-content-between bottom-box flex-wrap">--}}
                    {{--                                        <p>انتشار: 20 خرداد 1400</p>--}}
                    {{--                                        <div class="accept-comment d-flex align-items-center">--}}
                    {{--                                            <p>آیا این پیشنهاد را قبول دارید؟</p>--}}
                    {{--                                            <button class="btn">3<img src="{{asset('assets/img/like.svg')}}"--}}
                    {{--                                                                      alt=""></button>--}}
                    {{--                                            <button class="btn"><img src="{{asset('assets/img/dislike.svg')}}"--}}
                    {{--                                                                     alt="">0--}}
                    {{--                                            </button>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <div class="d-flex justify-content-between bottom-box flex-wrap">--}}
                    {{--                                <p>انتشار: 20 خرداد 1400</p>--}}
                    {{--                                <div class="accept-comment d-flex align-items-center">--}}
                    {{--                                    <p>آیا این پیشنهاد را قبول دارید؟</p>--}}
                    {{--                                    <button class="btn">3<img src="{{asset('assets/img/like.svg')}}" alt="">--}}
                    {{--                                    </button>--}}
                    {{--                                    <button class="btn"><img src="{{asset('assets/img/dislike.svg')}}" alt="">0--}}
                    {{--                                    </button>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </li>--}}
                </ul>
            </div>
        </section>
    @endif

</div>
