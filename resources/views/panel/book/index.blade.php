@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'مدیریت کتاب ها'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد کتاب</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="{{route('book.create')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>نام کتاب</label>
                            <input type="text" required name="title" class="form-control">
                        </div>
                        <div class="form-group row p-1 pr-2">
                            <div class=" col-6">
                                <label>اولین فصل </label>
                                <input type="number" min="1"  placeholder="1" required name="start" class="form-control">
                            </div>
                            <div class=" col-6">
                                <label>اخرین فصل </label>
                                <input type="number" min="1" placeholder="10" required name="end" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label>عکس کتاب</label>
                            <input type="file" required name="image" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>موضوعات (هر کدام در یک خط)</label>
                            <textarea name="topics" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success" value="ایجاد">
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>

        <!-- /.card -->


        <!-- /.card-body -->

    </div>



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کتاب ها</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>عکس</th>
                            <th>تعداد فصل</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$book->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/'.$book->image)}}" style="height: 50px">
                                </td>
                                <td>
                                    {{$book->seasons->count()}}
                                </td>
                                <td>
                                    <a href="#" data-id="{{$book->id}}"
                                       class="btn btn-danger btn-sm delete">
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
                    {!! $books->links() !!}
                </div>
            </div>

            <!-- /.card -->
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
                        DeleteBook(id);
                    }
                });
        });

        function DeleteBook(id) {
            obj = {
                id: id,
                _token: '{{csrf_token()}}',
                _method: 'delete'

            }

            $.ajax({
                url: '{{route('book.delete')}}',
                type: 'DELETE',
                data:obj,
                success: function (data) {
                    console.log(data)
                    window.location.reload();
                }
            });

        }

        //init ajax post

    </script>
@endpush
