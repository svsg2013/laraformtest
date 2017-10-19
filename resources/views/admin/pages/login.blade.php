<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{asset('admin/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{asset('admin/js/html5shiv.js')}}"></script>
        <script src="{{asset('admin/js/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="row">
                <div class="col-md-12">
                    @include('admin/layouts/err')
                </div>
            </div>
            <div class="header">Sign In</div>
            <form action="{{route('admin.login.postLogin')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="body bg-gray">
                    <div class="form-group">
                        <label>E-mail Login</label>
                        <input type="text" name="txtEmail" class="form-control" placeholder="E-Mail"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="txtPass" class="form-control" placeholder="Password"/>
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign In</button>
                </div>
            </form>


        <!-- jQuery 2.0.2 -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('admin/js/bootstrap.min.js')}}" type="text/javascript"></script>
        </div>
    </body>
</html>
