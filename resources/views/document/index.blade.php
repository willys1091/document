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
									<th>Division</th>
                                    <th>DocNo</th>
                                    <th>TypeDoc</th>
                                    <th>status</th>
                                    <th>Audit Date</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
								@php $x='1' @endphp
								@foreach($view as $v)
								<tr>
									<td>{{$x}}</td>
									<td>{{$v->division->name}}</td>
									<td>{{$v->doc_no}}/{{$v->sequence}}</td>
									<td>{{$v->doctype->name}}</td>
									<td>{{$v->status->name}}</td>
									<td>{{$v->audit_date}}</td>

								</tr>
								@php $x++ @endphp
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
