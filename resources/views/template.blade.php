<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{env('assets')}}img/logo.png"/>
	<link rel="apple-touch-icon" href="{{env('assets')}}img/logo.png"/>
	<link rel="image_src" href="{{env('assets')}}img/logo.png"/>
	<link rel="stylesheet" href="{{env('assets')}}plugins/fontawesome-pro/css/all.min.css ">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css">
	{{-- <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" > --}}
	<link rel="stylesheet" href="{{env('assets')}}plugins/jqvmap/jqvmap.min.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/pace-progress/themes/black/pace-theme-flat-top.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="{{env('assets')}}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{env('assets')}}plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{env('assets')}}plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="{{env('assets')}}plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="{{env('assets')}}plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="{{env('assets')}}plugins/fullcalendar-bootstrap/main.min.css">
	<link rel="stylesheet" href="{{env('assets')}}css/adminlte.min.css">
	<link rel="stylesheet" href="{{env('assets')}}custom.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

@if ((!Request::segment(1))||(Request::segment(1)=='forgot')||(Request::segment(1)=='reset'))
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ url('/') }}"><b>DMS</a>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				@include('notification')
				@yield('form')
			</div>
		</div>
		@yield('link')
	</div>
@else
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			@include('notification')
			@include('menu')
			@yield('content')
			<div class="modal fade" id="myModal"><div class="modal-dialog modal-lg"><div class="modal-content"></div></div></div>
			<footer class="main-footer">
				<strong>Copyright &copy; 2020 <a href="#">Butuhuang.id</a>.</strong>All rights reserved.
				<div class="float-right d-none d-sm-inline-block"><b>Version</b> 1.0.0</div>
            </footer>
            <aside class="control-sidebar control-sidebar-dark">
                <a class="btn btn-danger btn-sm float-sm-right" data-widget="control-sidebar" data-slide="false" href="#" role="button"><i class="fas fa-times"></i></a>
                @yield('rightside')
            </aside>

		</div>
@endif
<script src="{{env('assets')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="{{env('assets')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{env('assets')}}plugins/pace-progress/pace.min.js"></script>
<script src="{{env('assets')}}plugins/chart.js/Chart.min.js"></script>
<script src="{{env('assets')}}plugins/sparklines/sparkline.js"></script>
<script src="{{env('assets')}}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{env('assets')}}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="{{env('assets')}}plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="{{env('assets')}}plugins/moment/moment.min.js"></script>
<script src="{{env('assets')}}plugins/daterangepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
{{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script> --}}
<script src="{{env('assets')}}plugins/summernote/summernote-bs4.min.js"></script>
<script src="{{env('assets')}}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{env('assets')}}plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{env('assets')}}plugins/datatables/jquery.dataTables.js"></script>
<script src="{{env('assets')}}plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="{{env('assets')}}plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{env('assets')}}plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{env('assets')}}plugins/select2/js/select2.full.min.js"></script>
<script src="{{env('assets')}}plugins/moment/moment.min.js"></script>
<script src="{{env('assets')}}plugins/fullcalendar/main.min.js"></script>
<script src="{{env('assets')}}plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="{{env('assets')}}plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="{{env('assets')}}plugins/fullcalendar-interaction/main.min.js"></script>
<script src="{{env('assets')}}plugins/fullcalendar-bootstrap/main.min.js"></script>
<script src="{{env('assets')}}js/adminlte.js"></script>
<script src="{{env('assets')}}app.js"></script>
<script src="{{env('assets')}}js/jquery.mask.min.js"></script>
<script>

	$(".numonly").on("keypress keyup blur",function (event) {
		$(this).val($(this).val().replace(/[^\d].+/, ""));
			if ((event.which < 48 || event.which > 57)) {
			event.preventDefault();
		}
	});

	$('#myModal').on('shown.bs.modal', function() {

    $('input:text:visible:first', this).trigger('focus');
  });
</script>
</body>
</html>
