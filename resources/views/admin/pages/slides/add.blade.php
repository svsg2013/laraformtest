@extends('admin/masterAdmin')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Slides
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Slides</a></li>
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
                    <h3 class="box-title">Them Slide</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                {!! Form::open(['route'=>'slide.store','role'=>'form','enctype'=>'multipart/form-data']) !!}
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('Tieu de','Title') !!}
                        {!! Form::text('txtName',old('txtName'),['placeholder'=>'Nhập vào...','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Link','Link dung trong truong hop can chuyen trang') !!}
                        {!! Form::text('txtLink',old('txtLink'),['placeholder'=>'Nhập vào...','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('Content','Noi dung') !!}
                    <!-- size co the thay bang rows hay cols-->
                    {!! Form::textarea('txtSum','',['class'=>'form-control','placeholder'=>'Nhập vào...','size'=>'50x3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('exampleInputFile','Nhập file hình') !!}
                        {!! Form::file('inputImg',['id'=>'exampleInputFile']) !!}
                    </div>
                    <div class="box-footer">
                           {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        </div><!-- /.row -->
</section><!-- /.content -->
@endsection
