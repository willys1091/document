@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb') 
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
					<div class="card-body">
						<table id="dt3" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Type</th>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($view as $v)
								<tr>
									<td>{{$v->id}}</td>
									<td>{{$v->type}}</td>
									<td>{{$v->name}}</td>
									<td>
										<div class='float-right'>
											<a href="#" onclick='showM("{{url($modul)}}/{{$v->id}}/edit");return false' title="Edit" class='btn-right text-dark' data-toggle='modal'><i class='fas fa-edit'></i></a>
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>    
			</div>
		</div> 
	</section>
</div>	
@stop