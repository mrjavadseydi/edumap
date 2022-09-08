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
                            <th>منطقه</th>
                            <th>عنوان</th>
                            <th style="width: 35%">توضیحات</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$loop->iteration+(((request()->page??1)-1)*10)}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->user->province->title}}</td>
                                <td>{{$comment->title}}</td>
                                <td >
                                    @if(strlen($comment->body)>200)
                                        {{mb_substr($comment->body,0,200)}}...
                                        <a href="#cart-title" data-toggle="modal" class="btn btn-sm btn-outline-success"
                                           data-target="#exampleModalTitle"
                                           onclick="add_text('{{$comment->body}}');">
                                            مشاهده کامل
                                        </a>
                                    @else
                                        {{$comment->body}}

                                    @endif
                                </td>
                                <td>
                                    @if($comment->status==1)
                                        <span class="badge badge-success">تایید شده</span>
                                    @elseif($comment->status==0)
                                        <span class="badge badge-warning">بررسی نشده</span>
                                    @elseif($comment->status==2)
                                        <span class="badge badge-danger">رد شده</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('comment.update',['id'=>$comment->id,'status'=>1])}}" class="btn btn-success btn-sm">
                                        تایید
                                    </a>
                                    <a href="{{route('comment.update',['id'=>$comment->id,'status'=>2])}}" class="btn btn-warning btn-sm">
                                        رد
                                    </a>
                                    <a href="#" data-id="{{$comment->id}}" class="btn btn-danger btn-sm delete">
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
                    {!! $comments->links() !!}
                </div>
            </div>

            <!-- /.card -->
        </div>
    </div>
    <div class="modal fade" id="exampleModalTitle" style="overflow: visible;z-index: 99999999" tabindex="-1" role="dialog"
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
                        DeleteComment(id);
                    }
                });
        });

        function DeleteComment(id) {
            var url = '{{route('comment.delete')}}';

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
        function add_text(text){
            // document.getElementById('cart-title').scrollIntoView();
            document.getElementById('program_title').innerText = text
        }
    </script>

@endpush
