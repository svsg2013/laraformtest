@extends('admin/masterAdmin')
@section('content')
    <section class="content-header">
        <h1>
            Add Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
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
                        <h3 class="box-tiarte">  Danh Sách San Pham</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <form action="{{route('deletAll')}}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Images</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            <th>
                            <input type="checkbox" class="checkboxall">
                            </th>
                            <th> Check All</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td><img width="150" height="100" src="{{asset('uploads/products/thumbnail/'.$product->image)}}" /></td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->CateProduct->name}}</td>
                            <td><a href="{{route('product.destroy',$product->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
                            <td><a href="{{route('product.edit',$product->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                            <td>
                                <input type="checkbox" class="checkall" name="check[{{$product->id}}]">
                            </td>
                            <td>Check</td>
                        </tr>@endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Images</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            <th>
                                <input type="checkbox" class="checkboxall">
                            </th>
                            <th> Check All</th>
                        </tr>
                        </tfoot>
                    </table>
                    <input type="submit" value="Delete" />
                    </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section>
@endsection