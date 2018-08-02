@extends('layouts.index')

@section('content')

	<div id="page" class="container-fluid d-flex flex-column">

		<div id="page-content" class="row flex-grow-1 d-flex justify-content-center align-items-center">

			<div class="card card-nav-tabs col-11 col-sm-8 col-md-6 col-lg-4 col-xl-3">

				<div class="card-header card-header-primary">

					<h2 class="text-center">
						<strong>MEA</strong>
					</h2>

					<p class="card-category text-center">My English Assistant</p>

				</div>

				<div class="card-body">

					<div class="row justify-content-end">
						<button id="switch_register" type="button" class="btn btn-link text-primary">
							<i class="material-icons">person_add</i>
						</button>
					</div>


					<form id="log_in_frm" novalidate>

						<div class="form-group">
							<label for="email" class="bmd-label-floating">Email</label>
							<input type="email" class="form-control" name="email" autocomplete="off"/>
						</div>

						<div class="form-group">
							<label for="password" class="bmd-label-floating">Password</label>
							<input type="password" class="form-control" name="password" autocomplete="off"/>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary float-right">Log In</button>
							<button id="switch_password" type="button" class="btn btn-link text-primary float-right">Forgot password?
							</button>
						</div>

					</form>

					<form id="reset_password_frm" class="d-none" novalidate>

						<div class="form-group">
							<label for="email" class="bmd-label-floating">Email</label>
							<input type="email" class="form-control" name="email" autocomplete="off"/>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary float-right">Reset password</button>
							<button type="button" class="btn btn-link text-primary float-right switch_login">Log in</button>
						</div>

					</form>

					<form id="register_frm" class="d-none" novalidate>

						<div class="form-group">
							<label for="email" class="bmd-label-floating">Email</label>
							<input type="email" class="form-control" name="email" autocomplete="off"/>
						</div>

						<div class="form-group">
							<label for="password" class="bmd-label-floating">Password</label>
							<input type="password" class="form-control" name="password" autocomplete="off"/>
						</div>

						<div class="form-group">
							<label for="password_confirmation" class="bmd-label-floating">Confirm Password</label>
							<input type="password" class="form-control" name="password_confirmation" autocomplete="off"/>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary float-right">Register</button>
							<button type="button" class="btn btn-link text-primary float-right switch_login">Log in</button>
						</div>

					</form>


				</div>

			</div>

		</div>

	</div>

@endsection