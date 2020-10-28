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
                                    {!! $modul=='admin'?'<th>Title</th>':'' !!}
									<th>Email</th>
                                    <th>Name</th>
                                    {!! $modul=='admin'?'<th>Role</th>':'' !!}
                                    <th></th>
								</tr>
							</thead>
							<tbody>
								@php $x='1' @endphp
								@foreach($view as $v)
								<tr>
									<td>{{$x}}</td>
                                    {!! $modul=='admin'?'<td>'.$v->title.'</td>':'' !!}
									<td>{{$v->name}}</td>
									<td>{{$v->email}}</td>
									{!! $modul=='admin'?'<td>'.$v->roleid.'</td>':'' !!}
									<td>
										<div class='float-right'>
											{!!$v->active=='1'?'<a href="'.url('people/'.$modul.'/'.$v->id.'/0').'" title="Active" class="btn-right text-green" ><i class="fas fa-eye"></i></a>':'<a href="'.url('people/'.$modul.'/'.$v->id.'/1').'" title="Inactive" class="btn-right text-red"" ><i class="fas fa-eye-slash"></i></a>'!!}

											&nbsp;&nbsp;
											<a href="#" onclick='showM("{{url('people/'.$modul.'/'.$v->id)}}");return false' title="Edit" class='btn-right text-dark' data-toggle='modal'><i class='fas fa-edit'></i></a>
										</div>
									</td>
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
