@extends('panel.master')
@section('bread-crumb')
    @include('panel.sections.bread-crumb',['current'=>'ویرایش کاربران'])
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{route('users.update',$user->id)}}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش کاربران</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <div class="row p-1 m-1">
                            <div class="input-group">
                                <div class="col-md-6">
                                    <label>نام</label>
                                    <input type="text" name="name" required class="form-control"
                                           value="{{$user->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label>ایمیل</label>
                                    <input type="text" name="email" required class="form-control"
                                           value="{{$user->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="row p-1 m-1">
                            <div class="input-group">
                                @livewire('user-province',['user'=>$user])
                                <div class="col-md-4">
                                    <label>دسترسی</label>
                                    <select name="role" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}"
                                                    @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row p-1 m-1">
                            <div class="input-group">
                                <div class="col-md-6">
                                    <label>کلمه عبور</label>
                                    <input type="password" name="password" class="form-control"/>
                                </div>
                                <div class="col-md-6">
                                    <label> تکرار کلمه عبور</label>
                                    <input type="password" name="repassword" class="form-control"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    @method('put')
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <input type="submit" class="btn btn-success" value="ویرایش">
                        <a href="{{route('users.index')}}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </form>

            <!-- /.card -->
        </div>
    </div>
@endsection
@push('scripts')

@endpush
