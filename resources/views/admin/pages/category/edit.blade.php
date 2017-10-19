@extends('admin/masterAdmin')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Edit Category
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Category</a></li>
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
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(['route'=>['category.update',$cates->id],'method'=>'put','role'=>'form']) !!}
                    <div class="form-group">
                        {!! Form::label('loai tin','Loại Tin') !!}
                        {!! Form::text('txtName',$cates->name,['class'=>'form-control']) !!}
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