@extends('admin/masterAdmin')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Loại Tin
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Item News</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin/layouts/err')
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-titypecatee">Danh Sách Loại Tin</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($typecates as $typecate)
                            <tr>
                                <td>{{$typecate->id}}</td>
                                <td>{{$typecate->name}}</td>
                                <td>{{$typecate->alias}}</td>
                                <td>{{$typecate->Category->name}}</td>
                                <td><a href="{{route('typecate.show',$typecate->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
                                <td><a href="{{route('typecate.edit',$typecate->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                            </tr>@endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
@endsection