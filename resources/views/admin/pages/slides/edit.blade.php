@extends('admin/masterAdmin')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Slide</a></li>
        <li class="active">Edit</li>
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
                    <h3 class="box-title">Thêm Tin Tức</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('slide.update',$slides->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <!-- text input -->
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input type="text" class="form-control" name="txtName" placeholder="Nhập vào..." value="{{old('txtName',isset($slides)?$slides->name:null)}}"/>
                        </div>
                        <div class="form-group">
                            <label>Link (nếu có để chuyển sang Trang khác - Đa phần được dùng cho Page 'trang không hiện ra')</label>
                            <input type="text" class="form-control" name="txtLink"placeholder="Nhập vào..." value="{{old('txtLink',isset($slides)?$slides->link:null)}}"/>
                        </div>
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Nội dung (nếu có)</label>
                            <textarea class="form-control" rows="3" name="txtSum" placeholder="Nhập vào...">{{old('txtSum',isset($slides)?$slides->summary:null)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Nhập file hình</label>
                            <input id="exampleInputFile" type="file" name="inputImg">
                            <img src="{{asset('uploads/slide/'.$slides->image)}}" alt="..." class="margin" width="150" height="100">
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div><!-- /.row -->
</section><!-- /.content -->
@endsection
