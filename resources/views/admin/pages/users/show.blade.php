@extends('admin/masterAdmin')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        General Form Elements
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('admin/layouts/err')
        </div>
    </div>
    <div class="row">
        <!--begin-row-->
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Update Username</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('user.destroy',$users->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <!-- text input -->
                        <div class="form-group">
                            <label>Họ và Tên</label>
                            <input type="text" class="form-control" name="txtName" value="{{old('txtTieuDe',isset($users)?$users->username:null)}}"/>
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="txtMail"  value="{{old('txtLink',isset($users)?$users->email:null)}}" disabled/>
                        </div>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <label class="radio-inline">
                                @if($users->level == 0)
                                    {{'Thai Giam'}}
                                    @else
                                    {{'Hoang Thuong'}}
                                @endif
                            </label>
                        </div>
                        <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div><!-- /.row -->
</section><!-- /.content -->
@endsection
