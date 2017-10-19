@extends('admin/masterAdmin')
@section('content')
    <section class="content-header">
        <h1>
            cateprogory Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">cateprogory Product</a></li>
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
                        <h3 class="box-ticateproe">Danh sách thể loại</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <?php $stt=0; ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Link</th>
                                <th>Parent cateprogory</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($catepros as $catepro)
                            <tr>
                                <td>{{$stt= $stt+1}}</td>
                                <td>{{$catepro->name}}</td>
                                <td>{{$catepro->alias}}</td>
                                <td>
                                    @if($catepro->idParent ==0)
                                        {{'None'}}
                                        @else
                                        <?php 
                                            $parents= DB::table('cate_products')->where('id',$catepro->idParent)->get()->first();
                                            echo $parents->name;
                                        ?>
                                    @endif
                                </td>
                                <td><a href=""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
                                <td><a href="{{route('catepro.edit',$catepro->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                            </tr>@endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Link</th>
                                <th>Parent cateprogory</th>
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