@extends('admin/masterAdmin')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách User
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/admin/user')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
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
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->level == 1)
                                        <b style="color: #d58512">{{'Hoàng Thượng'}}</b>
                                        @else
                                        <b style="color: #932ab6">{{'Thái Giám'}}</b>
                                    @endif
                                </td>
                                <td><a href="{{route('user.destroy',$user->id,method_field('DELETE'))}}"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a></td>
                                {{ method_field('DELETE') }}
                                <td><a href="{{route('user.edit',$user->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                            </tr>@endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Role</th>
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