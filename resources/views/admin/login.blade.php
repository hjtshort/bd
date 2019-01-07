<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin Login</title>

    <link href="{{ asset('cpanel/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('cpanel/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('cpanel/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('cpanel/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">CR</h1>

            </div>
            <h3>Admin Panel</h3>
            <form class="m-t" role="form" action="" method="post" enctype='multipart/form-data'>
                @csrf
                 @if(Session::has('mess_error'))
                 <div class="alert alert-danger">
                    {{ Session::get('mess_error') }}
                 </div>
                 @endif
                <div class="form-group">
                    <input name="email" type="text" class="form-control" placeholder="Email" >
                    <label class="text-danger">{{ $errors->first('email') }}</label>
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Password" >
                    <label class="text-danger">{{ $errors->first('password') }}</label>
                </div>
                  
           
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
             
                
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
