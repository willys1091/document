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
									<th>Name</th>
									<th>Email</th>
									@if($modul=='system')
										<th>IP Address</th>
										<th>Description</th>
									@else
										<th>To</th>
										<th>Subject</th>
									@endif
									<th>Timestamp</th>
								</tr>
							</thead>
							<tbody>
							@foreach($log as $l)
							<tr>
								<td>{{$l->id}}</td>
								<td>{{$l->name}}</td>
								<td>{{$l->email}}</td>
								@if($modul=='system')
									<td>{{$l->ipaddress}}</td>
									<td>{{$l->description}}</td>
								@else
									<td>{{$l->to}}</td>
									<td>{{$l->subject}}</td>
								@endif
								
								<td>{{$l->timestamp}}</td>
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