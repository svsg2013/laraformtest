@extends('admin/masterAdmin')
@section('content')
    <section class="content-header">
        <h1>
            Slides
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">slideides</a></li>
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
                        <h3 class="box-title">Danh Sách Banner</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $slide)
                            <tr>
                                <td>{{$slide->id}}</td>
                                <td><img width="150" height="100" src="{{asset('uploads/slide/'.$slide->image)}}" /></td>
                                <td>{!! $slide->name !!}</td>
                                <td>{{$slide->summary}}</td>
                                <td>{{$slide->link}}</td>
                                <td><a href="{{route('slide.show',$slide->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
                                <td><a href="{{route('slide.edit',$slide->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                            </tr>@endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
@endsection