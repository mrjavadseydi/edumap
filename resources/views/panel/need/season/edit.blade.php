@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'ویرایش فصل'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش فصل</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="{{route('needSeason.update',$season->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>نام فصل</label>
                            <input type="text" required name="title" value="{{$season->title}}" class="form-control">
                        </div>
                        <div class="form-group col-12">
                            <label>عکس فصل</label>
                            <input type="file" required name="image" class="form-control">
                        </div>
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
