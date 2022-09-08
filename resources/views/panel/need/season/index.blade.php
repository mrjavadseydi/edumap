@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'مدیریت فصل ها'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">مدیریت فصل ها</h3>

                    <div class="card-tools">
                        <a href="{{route('needSeason.create',['id'=>request()->get('id')])}}" class="btn btn-success btn-sm">ایجاد فصل جدید</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عکس</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seasons as $season)

                            <tr>
                                <td>{{$loop->iteration+(((request()->page??1)-1)*10)}}</td>
                                <td>{{$season->title}}</td>
                                <td>
                                    <img src="{{asset('uploads/'.$season->image)}}" style="height: 50px">
                                </td>
                                <td>

                                    <a href="{{route('needSeason.edit',$season->id)}}" data-id="{{$season->id}}" class="btn btn-warning btn-sm ">
                                        ویرایش
                                    </a>
                                    <a href="#" data-id="{{$season->id}}" class="btn btn-danger btn-sm delete">
                                        حذف
                                    </a>
                                    <a href="{{route('needDetail.index',['id'=>$season->id])}}" data-id="{{$season->id}}" class="btn btn-success btn-sm">
                                        مدیریت پیشنهادات
                                    </a>

                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body   -->
                <div class="card-footer clearfix">
                    {!! $seasons->links() !!}
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
                        DeleteMap(id);
                    }
                });
        });

        function DeleteMap(id) {
            var url = '{{route('needSeason.destroy',':id')}}';
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

    </script>

@endpush
