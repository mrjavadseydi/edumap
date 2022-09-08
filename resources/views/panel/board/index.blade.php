@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'مدیریت کاربران'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">مدیریت کاربران</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> نام ارسال کننده</th>
                            <th>عنوان</th>
                            <th style="width: 35%">توضیحات</th>
                            <th>پیوست</th>

                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($boards as $board)
                            <tr>
                                <td>{{$loop->iteration+(((request()->page??1)-1)*10)}}</td>
                                <td>{{$board->user->name}}</td>
                                <td>{{$board->title}}</td>
                                <td>
                                    @if(strlen($board->body)>200)
                                        {{mb_substr($board->body,0,200)}}...
                                        <a href="#cart-title" data-toggle="modal" class="btn btn-sm btn-outline-success"
                                           data-target="#exampleModalTitle"
                                           onclick="add_text('{{$board->body}}');">
                                            مشاهده کامل
                                        </a>
                                    @else
                                        {{$board->body}}

                                    @endif
                                </td>
                                <td>
                                    @if($board->files->count()>0)
                                        @foreach($board->files as $file)

                                            <a href="{{asset('uploads/'.$file->path)}}"
                                               class="btn btn-sm btn-outline-success">دانلود</a>
                                        @endforeach
                                    @else
                                        بدون پیوست
                                    @endif
                                </td>
                                <td>
                                    @if($board->status==1)
                                        <span class="badge badge-success">تایید شده</span>
                                    @elseif($board->status==0)
                                        <span class="badge badge-warning">بررسی نشده</span>
                                    @elseif($board->status==2)
                                        <span class="badge badge-danger">رد شده</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('board.update',['id'=>$board->id,'status'=>1])}}"
                                       class="btn btn-success btn-sm">
                                        تایید
                                    </a>
                                    <a href="{{route('board.update',['id'=>$board->id,'status'=>2])}}"
                                       class="btn btn-warning btn-sm">
                                        رد
                                    </a>
                                    <a href="#" data-id="{{$board->id}}" class="btn btn-danger btn-sm delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {!! $boards->links() !!}
                </div>
            </div>

            <!-- /.card -->
        </div>
    </div>
    <div class="modal fade" id="exampleModalTitle" style="overflow: visible;z-index: 99999999" tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="add">
                    <h5 class="modal-title" id="exampleModalLabel">متن نظر</h5>
                </div>
                <div class="modal-body ">
                    <div class="p-1 m-1">
                        <p id="program_title">

                        </p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary">بستن</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $('.delete').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "بعد از حذف امکان دسترسی به این آیتم را ندارید!",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: 'حذف',
                denyButtonText: `منصرف شدم`,
            })
                .then((result) => {
                    if (result.isConfirmed) {
                        DeleteBoard(id);
                    }
                });
        });

        function DeleteBoard(id) {
            var url = '{{route('board.delete')}}';

            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    '_token': '{{csrf_token()}}',
                    'id': id,
                },
                success: function (data) {
                    window.location.reload();
                }
            });

        }

        //init ajax post
        function add_text(text) {
            // document.getElementById('cart-title').scrollIntoView();
            document.getElementById('program_title').innerText = text
        }
    </script>

@endpush
