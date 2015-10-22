<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>KPI Collector</title>
	<!-- stylesheet -->
	<link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.css">
	<!-- fixedHeader -->
	<link href="//cdn.datatables.net/fixedheader/2.1.2/css/dataTables.fixedHeader.min.css" rel="stylesheet" />
	<!-- toastr.js -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- select 2 -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />
	<!-- font-awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- select  -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	
	<!-- app -->
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<script type="text/javascript">
	var domain = "{{ url('/') }}" ;
	var api    = "{{ url('/api/v1') }}" ;
	</script>	
</head>

<body>

<nav class="navbar navbar-custom   navbar-fixed-top" role="banner" data-spy="affix" data-offset-top="80">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="/images/logo.png"  class="logo" /></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav">
				@if ( Auth::guest() )

				@else
					<li>
						<a href="{{ url('/category') }}"> <i class="fa fa-cubes"></i> Category </a>
					</li>
					<li>
						<a href="{{ url('/product') }}"> <i class="fa fa-cube"></i> Product </a>
					</li>
					<li>
						<a href="{{ url('/kpi') }}"> <i class="fa fa-area-chart"></i> KPI </a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="fa fa-user"></i> Users <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/user') }}">Users</a></li>
								<li><a href="{{ url('/user/admin') }}">Admins</a></li>
								<li><a href="{{ url('/user/role') }}">Roles</a></li>
							</ul>
					</li>	
				@endif
			</ul>

			<ul class="nav navbar-nav navbar-right" style="margin-right:5px">
				@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}">Login</a></li>
					<li><a href="{{ url('/auth/register') }}">Register</a></li>
				@else
					<!-- Auth User Menu Bar -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/user/profile') }}">My Profile</a></li>
								<li><a href="{{ url('/user/password') }}">Password</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
					</li>
				@endif
			</ul>

		</div>
	
</nav>


@if(Session::has('message'))
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong> {{ Session::get('message') }} </strong>
    </div>
@endif


@if( $errors->any() )
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>Whoops!</strong> There were some problems with your input.
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Page Content -->
<div class="container-fluid" style="margin-top:100px">
<div class="container" style="background:#ffffff">
@yield('content')
</div>
</div>
<!-- /end Page Content -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">KPI by Javier Ciocci</p>
      </div>
    </footer>

<!-- Global Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- dataTables -->
<script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.10.6/integration/bootstrap/3/dataTables.bootstrap.js"></script>	
<script src="//cdn.datatables.net/fixedheader/2.1.2/js/dataTables.fixedHeader.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<!--
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>
-->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/product.js') }}"></script>
<script src="{{ asset('assets/js/category.js') }}"></script>
<script src="{{ asset('assets/js/kpi.js') }}"></script>
<script src="{{ asset('assets/js/user.js') }}"></script>
<!-- Page Scripts -->
@yield('PageScripts')
<!-- / End Page Scripts -->
<script type="text/javascript">
$(".select2").select2({
  placeholder: "type owners"
});  
</script>
</body>
</html>
