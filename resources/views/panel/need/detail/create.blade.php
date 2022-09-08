@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'ایجاد پیشنهاد'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد پیشنهاد</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-2">
                    <form action="{{route('needDetail.store',['id'=>request()->get('id')])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>عنوان</label>
                            <input type="text" required name="title" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="description">توضیحات</label>
                            <textarea id="some-textarea" class="form-control"  DIR="RTL" class="col-md-12" name="body"
                                      placeholder="توضیحات و راهکار ها " style=""></textarea>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success" value="ایجاد">
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
    <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#some-textarea'))
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })
    </script>
@endpush
