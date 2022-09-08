@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'ویرایش نقشه'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش نقشه</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="{{route('need.update',$map->id)}}" method="post" class="p-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class=" col-6">
                                <label>عنوان نقشه</label>
                                <input type="text" class="form-control" placeholder="نقشه ضروری علوم" value="{{$map->title}}" name="title">
                            </div>
                            <div class=" col-6">
                                <label>کتاب</label>
                                <select class="form-control" name="book_id">
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}" {{$map->book_id==$book->id?"selected":""}}>{{$book->title}}</option>

                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <br>
                        @method('PUT')
                        <input type="submit" class="btn btn-success" value="ویرایش">
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
        </div>

        <!-- /.card -->


        <!-- /.card-body -->

    </div>

@endsection
@push('scripts')
{{--    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>--}}

{{--    <script>--}}
{{--        ClassicEditor--}}
{{--            .create(document.querySelector('#some-textarea'))--}}
{{--            .then(function (editor) {--}}
{{--                // The editor instance--}}
{{--            })--}}
{{--            .catch(function (error) {--}}
{{--                console.error(error)--}}
{{--            })--}}
{{--    </script>--}}
@endpush
