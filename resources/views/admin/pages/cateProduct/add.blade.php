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
                    <form action="{{route('catepro.store')}}" method="POST" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <!-- text input -->
                        <div class="form-group">
                            <label>Option Category</label>
                            <select class="form-control" name="slName">
                                <option value="0">Please, option select...</option>
                                <?php category_parent($parent) ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type Catetgory</label>
                            <input type="text" name="txtName" class="form-control" placeholder="Nhập vào..."/>
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