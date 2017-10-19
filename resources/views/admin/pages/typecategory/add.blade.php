@extends('admin/masterAdmin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Type Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
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
                    <h3 class="box-ticatee">Thêm Thể Loại</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(['route'=>'typecate.store','role'=>'form']) !!}
                        <div class="form-group">
                            {!! Form::label('select option','Option Category') !!}
                            {!! Form::select('slName',$cates,'',['class'=>'form-control','placeholder'=>'Please Option...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Type Catetgory','Type Catetgory') !!}
                            {!! Form::text('txtName',old('txtName'),['placeholder'=>'Nhập vào...','class'=>'form-control']) !!}
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