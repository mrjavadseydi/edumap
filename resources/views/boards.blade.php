@extends('layouts.master')
@section('content')
    <div class="container">
        @foreach($boards as $board)

            <div class="teacher-suggestion">
                <h4 class="title">{{$board->title}}</h4>
                <div class=" teacher-suggestion-box">
                    <div class="d-flex">
                        @if($board->book_id)

                        <div class="img-box">
                            <img src="{{asset('uploads/'.\App\Models\Book::where('id',$board->book_id)->first()->image)}}" alt="">
                        </div>
                        @endif
                        <div class="specifications-box">
                            <div class="">
                                <img src="{{asset('assets/img/user-edit.svg')}}" alt="">
                                {{$board->user->name}}
                            </div>
                            <div class=""><img src="{{asset('assets/img/link-2.svg')}}" alt="">
                            @if($board->files->count() > 0)
                                <a href="{{asset('uploads/'.$board->files->first()->path)}}">دانلود فایل</a>
                            @else
                                بدون پیوست
                            @endif

                            </div>
                            @if($board->book_id)
                                <div class=""><img src="{{asset('assets/assets/img/document-text.svg')}}" alt="">
                                {{\App\Models\Book::where('id',$board->book_id)->first()->title}}
                                </div>
                                <div class=""><img src="{{asset('assets/assets/img/document-text.svg')}}" alt="">
                                {{\App\Models\Season::where('id',$board->season_id)->first()->title}}
                                </div>
                            @endif

                                <div class=""><img src="{{asset('assets/img/calendar-edit.svg')}}" alt="">انتشار
                                {{\Morilog\Jalali\Jalalian::fromDateTime($board->created_at)->format('Y/m/d')}}
                            </div>
                        </div>
                    </div>
                    <div class="dscp-box">

                        <p>
                            {!! $board->body !!}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $boards->links() !!}
    </div>
@endsection
