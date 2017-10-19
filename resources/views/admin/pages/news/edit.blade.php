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
                    <h3 class="box-ticatee">Thêm Tin Tức</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('article.update',$arts->id)}}" method="POST" role="form" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <!-- text input -->
                        <div class="form-group">
                            <label>Chọn Thể Loại</label>
                            <select class="form-control" name="slCate" id="Cate">
                                <option value="0">Vui lòng chọn thể loại...</option>
                                @foreach($cates as $cate)
                                @if(isset($cate->id))
                                <option
                                    @if($arts->typecategory->category->id == $cate->id)
                                        {{'selected'}}
                                    @endif

                                value="{{$cate->id}}">{{$cate->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn Loại Tin</label>
                            <select class="form-control" name="slTypeCate" id="TypeCate">
                                <option value="0">Vui lòng chọn thể loại...</option>
                                @foreach($typecates as $typecate)
                                 @if(isset($typecate->id))
                                    <option
                                    @if($arts->typecategory->id == $typecate->id)
                                    {{'selected'}}
                                    @endif
                                    value="{{$typecate->id}}">{{$typecate->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input type="text" class="form-control" name="txtTitle"placeholder="Nhập vào..." value="{{old('txtTitle',isset($arts->title)?$arts->title:null)}}"/>
                        </div>
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Tóm Tắt (description)</label>
                            <textarea class="form-control" rows="3" name="txtSum" placeholder="Nhập vào...">{{old('txtSum',isset($arts->summary)?$arts->summary:null)}}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea id="demo" name="txtEditor" rows="10" cols="80" class="ckeditor">{{old('txtEditor',isset($arts->content)?$arts->content:null)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Keywords</label>
                            <input type="text" class="form-control" name="txtKeywords"placeholder="Nhập vào..." value="{{old('txtKeywords',isset($arts->keywords)?$arts->keywords:null)}}"/>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="txtDes"placeholder="Nhập vào..." value="{{old('txtDes',isset($arts->description)?$arts->description:null)}}"/>
                        </div>
                        <div class="form-group">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="0"
                                    @if($arts->featured == 0)
                                        {{'checked'}}
                                    @endif
                                type="radio"> Không
                            </label>
                            <label class="radio-inline">
                                <input name="rdoStatus" value="1" 

                                @if($arts->featured == 1)
                                    {{'checked'}}
                                @endif

                                type="radio"> Có
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Nhập file hình</label>
                            <input id="exampleInputFile" type="file" name="inputImg">
                            <img src="{{asset('uploads/tintuc/'.$arts->image)}}" alt="..." class="margin" width="150" height="100">
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
