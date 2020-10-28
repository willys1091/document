@extends('template')
@section('form')
<p class="login-box-msg">Sign in to start your session</p>
<form action="{{ url('validasi') }}" method="post">@csrf
	<div class="input-group mb-3">
		<input type="email" class="form-control" placeholder="Email" name="email" required>
		<div class="input-group-append">
			<div class="input-group-text"><span class="fas fa-envelope"></span></div>
		</div>
	</div>
	<div class="input-group mb-3">
		<input type="password" class="form-control" placeholder="Password" name="password" required>
		<div class="input-group-append">
			<div class="input-group-text"><span class="fas fa-lock"></span></div>
		</div>
	</div>
	<div class="row">
		<div class="col-8"></div>
		<div class="col-4"><button type="submit" class="btn btn-primary btn-block">Sign In</button></div>
	</div>
</form>
@stop
@section('link')
	<p class="mb-1 text-center">
		<a href="{{ url('forgot') }}">I forgot my password</a>
	</p>
@stop
