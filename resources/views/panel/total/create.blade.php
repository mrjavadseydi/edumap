@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'ایجاد نقشه'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد نقشه</h3>

                    <div class="card-tools">

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <form action="{{route('total.store')}}" method="post" class="p-2" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class=" col-4">
                                <label>ماه این نقشه</label>
                                <select class="form-control" name="month">
                                    <option>فروردین</option>
                                    <option>اردیبهشت</option>
                                    <option>خرداد</option>
                                    <option>تیر</option>
                                    <option>مرداد</option>
                                    <option>شهریور</option>
                                    <option>مهر</option>
                                    <option>آبان</option>
                                    <option>آذر</option>
                                    <option>دی</option>
                                    <option>بهمن</option>
                                    <option>اسفند</option>
                                </select>
                            </div>
                            <div class=" col-4">
                                <label>کتاب</label>
                                <select class="form-control" name="book_id">
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->title}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-4">
                                <label>عنوان نقشه</label>
                                <input type="text" class="form-control" placeholder="تکالیف و خلع ها" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            @livewire('map.state-select')
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
