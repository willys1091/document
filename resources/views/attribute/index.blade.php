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
                                    {!! $modul<>'division'?'<th>Color</th>':'' !!}

								</tr>
							</thead>
							<tbody>
								@php $x='1' @endphp
								@foreach($view as $v)
								<tr>
									<td>{{$x}}</td>

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
