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
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>استان</th>
                            <th>منطقه</th>
                            <th>نوع کاربر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->province->title??'ندارد'}}</td>
                                <td>{{$user->state->title??"ندارد"}}</td>
                                <td>{{$user->roles[0]->name ?? "ندارد"}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" data-id="{{$user->id}}" class="btn btn-danger btn-sm delete">
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
                    {!! $users->links() !!}
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
                        DeleteUser(id);
                    }
                });
        });

        function DeleteUser(id) {
            var url = '{{route('users.destroy',':id')}}';
            url = url.replace(':id', id);

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

    </script>
@endpush
