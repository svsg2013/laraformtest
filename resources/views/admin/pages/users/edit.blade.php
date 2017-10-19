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
                    <form action="{{route('user.update',$users->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
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
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="txtPass" id="exampleInputPassword1" value="" placeholder="New Password" >
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="txtRPass" id="exampleInputPassword1" value="" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="0"
                                       @if($users->level == 0)
                                               {{'checked'}}
                                       @endif
                                       type="radio"> Thái Giám
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1"
                                       @if($users->level == 1)
                                       {{'checked'}}
                                       @endif
                                       type="radio"> Hoàng Thượng
                            </label>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div><!-- /.row -->
</section><!-- /.content -->
@endsection
