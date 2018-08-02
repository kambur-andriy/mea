<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

	<title>MEA</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/application.css">
	<link rel="stylesheet" href="/css/theme/material-dashboard.min.css">

	<!--   Core JS Files   -->
	<script src="/js/theme/jquery.min.js" type="text/javascript"></script>
	<script src="/js/theme/popper.min.js" type="text/javascript"></script>
	<script src="/js/theme/bootstrap-material-design.min.js" type="text/javascript"></script>

	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="/js/theme/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>

	<!--  User scripts    -->
	<script src="/js/user.js" type="text/javascript"></script>

	<!--  Page scripts    -->
	@stack('scripts')



</head>
<body>

<div class="wrapper ">

	<div class="sidebar" data-color="purple" data-background-color="white" data-image="/images/sidebar.jpg">

		<div class="logo">
			<a href="" class="simple-text logo-normal">
				MEA
			</a>
		</div>

		<div class="sidebar-wrapper">

			<ul class="nav">

				<li class="nav-item">
					<a class="nav-link" href="{{ asset('/user')}}">
						<i class="material-icons">dashboard</i>
						<p>Dashboard</p>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="{{ asset('/user/translate')}}">
						<i class="material-icons">school</i>
						<p>Translate</p>
					</a>
				</li>

				<li class="nav-item ">
					<a class="nav-link" href="{{ asset('/user/dictionary/extend')}}">
						<i class="material-icons">library_add</i>
						<p>Extend Dictionary</p>
					</a>
				</li>

				<li class="nav-item ">
					<a class="nav-link" href="{{ asset('/user/dictionary')}}">
						<i class="material-icons">pages</i>
						<p>Dictionary</p>
					</a>
				</li>

				<li class="nav-item ">
					<a class="nav-link" href="{{ asset('/user/dictionary/revise')}}">
						<i class="material-icons">cached</i>
						<p>Revise</p>
					</a>
				</li>

				<li class="nav-item ">
					<a class="nav-link" href="{{ asset('/user/dictionary/practice')}}">
						<i class="material-icons">schedule</i>
						<p>Practice</p>
					</a>
				</li>

			</ul>

		</div>

	</div>

	<div class="main-panel">

		<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">

			<div class="container-fluid">

				<div class="navbar-wrapper">

					<a class="navbar-brand" href="">
						@yield('title')
					</a>

				</div>

				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
				        aria-label="Toggle navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="navbar-toggler-icon icon-bar"></span>
					<span class="navbar-toggler-icon icon-bar"></span>
					<span class="navbar-toggler-icon icon-bar"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end">

					<form id="search_form" class="navbar-form">

						<div class="input-group no-border">

							<div id="clear_search" class="input-group-prepend d-none">
							      <span class="input-group-text close">
							          <i class="material-icons">close</i>
							      </span>
							</div>

							<input type="text" value="" class="form-control" placeholder="Search...">

							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i>
								<div class="ripple-container"></div>
							</button>

						</div>

					</form>

					<ul class="navbar-nav">

						<li class="nav-item">
							<a id="log_out" class="nav-link" href="">
								<i class="material-icons">exit_to_app</i>
								<p class="d-lg-none d-md-block">
									Log Out
								</p>
							</a>
						</li>
					</ul>
				</div>
			</div>

		</nav>

		<div class="content">

			<div class="container-fluid">

				@yield('content')

			</div>

		</div>


	</div>

</div>

</body>
</html>
