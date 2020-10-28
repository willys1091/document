@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb') 
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
					<div class="card-body">
						<form action="{{url('people/roles')}}" method="post" role="form">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
						            <label for="name">Name <span class='merah'>*</span></label>
						            <input type="text" class="form-control" name="name" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
						            <label for="name">Name <span class='merah'>*</span></label>
						            <select class="form-control select2bs4" name="type" style="width: 100%;" tabindex="-1" aria-hidden="true">
				             			{!!Session::get('type')=="superadmin"?"<option value='superadmin'>Superadmin</option>":""!!}
				             			<option value="admin">Admin</option>
				             			<option value="user">User</option>
			             			</select>
								</div>
							</div>
							<div class="col-md-3"><h5>Attributes</h5>
								<div class="checkbox"><label><input type="checkbox" name="perms[]" value="viewHome"> Add</label></div>
								<div class="checkbox"><label><input type="checkbox" name="perms[]" value="viewHome"> Edit</label></div>
								<div class="checkbox"><label><input type="checkbox" name="perms[]" value="viewHome"> View</label></div>
							</div>
							<div class="col-md-3"><h4>Home</h4>
							<div class="checkbox"><label><input type="checkbox" name="perms[]" value="viewHome"> View Home</label></div>
							</div>
							<div class="col-md-3"><h4>Home</h4>
							
							</div>
							<div class="col-md-3"><h4>Home</h4>
							
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Create</button>
								<a onclick="javascript:checkAll('roleForm', true);" href="javascript:void();" class="btn btn-default" ><i class="fa fa-check-square-o"></i> Check All</a>
								<a onclick="javascript:checkAll('roleForm', false);" href="javascript:void();" class="btn btn-default" ><i class="fa fa-square-o"></i> Uncheck All</a>
							</div>
						</div>
						
						
						</form>
					</div>
				</div>    
			</div>
		</div> 
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('.select2bs4').select2({ theme: 'bootstrap4' })
		bsCustomFileInput.init();
	});
</script>	
@stop