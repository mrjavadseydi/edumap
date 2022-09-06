<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$current ?? "خانه"}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item {{!isset($current) ? "active" : ''}}"><a href="{{route('dashboard')}}">خانه</a></li>
                    @if(isset($current))
                        <li class="breadcrumb-item active">{{$current}}</li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
