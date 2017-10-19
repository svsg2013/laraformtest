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
        <li class="active">Show</li>
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
                    <h3 class="box-ticatee">{{$typecates->name}}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="{{route('typecate.destroy',$typecates->id)}}" method="POST" role="form">
                    {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <!-- text input -->
                        <div class="form-group">
                            <label>Type Category Name</label>
                            <input type="text" name="txtName" class="form-control" placeholder="{{old('txtName',isset($typecates)?$typecates->name:null)}}"/>
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