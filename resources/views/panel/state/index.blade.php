@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'مدیریت بخش ها'])
@endsection
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد استان</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="{{route('state.create')}}" method="post">
                        <div class="form-group col-12">
                            <label>نام استان</label>
                            <input type="text" required name="title" class="form-control">
                            @csrf
                        </div>
                        <input type="submit" class="btn btn-success" value="ایجاد">
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>

        <!-- /.card -->

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد بخش</h3>

                    <div class="card-tools">
                    </div>
                </div>
                    <div class="card-body table-responsive p-0">

                        <form action="{{route('state.create')}}" method="post">
                            <div class="form-group col-12">
                                <label>استان</label>
                                <select class="form-control" name="province_id">
                                    @foreach(\App\Models\Province::all() as $province)
                                        <option value="{{$province->id}}">{{$province->title}}</option>
                                    @endforeach
                                </select>
                                @csrf
                            </div>
                            <div class="form-group col-12">
                                <label>نام بخش</label>
                                <input type="text" required name="title" class="form-control">
                                @csrf
                            </div>
                            <input type="submit" class="btn btn-success" value="ایجاد">
                        </form>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->

        </div>



    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">استان ها</h3>

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

                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($provinces as $province)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$province->title}}</td>
                                <td>
                                    <a href="#" data-id="{{$province->id}}" data-type="province_id"
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
                    {!! $provinces->links() !!}
                </div>
            </div>

            <!-- /.card -->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> بخش ها</h3>

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
                            <th>استان</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($states as $state)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$state->title}}</td>
                                <td>{{$state->province->title}}</td>
                                <td>
                                    <a href="#" data-id="{{$state->id}}" data-type='state_id'
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
                    {!! $states->links() !!}
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
            var type = $(this).data('type');

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
                        DeleteState(id, type);
                    }
                });
        });

        function DeleteState(id, type_id) {
            if(type_id==="state_id"){
                obj = {
                    state_id: id,
                    _token: '{{csrf_token()}}',
                    _method: 'delete'
                }
            }else {
                obj = {
                    province_id: id,
                    _token: '{{csrf_token()}}',
                    _method: 'delete'

                }
            }
            $.ajax({
                url: '{{route('state.delete')}}',
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
