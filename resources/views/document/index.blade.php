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
									<td><span class="badge" style="background-color:{{$v->status->color}};color:#fff;border:1px solid {{$v->status->color}}">{{$v->status->name}}</span></td>
									<td>{{$v->audit_date}}</td>
                                    <td>
                                        <div class='float-right'>
                                            @foreach($approval as $a)
                                                @if($a->document_id==$v->id)
                                                    @if($a->email ==Session::get('email'))
                                                        @if($a->status_id=='2')
                                                            <a href="{{url('approval/'.base64_encode('3/'.$v->id.'/'.$a->id.'/'.$a->email.'/web'))}}" title="Approve" class="btn-right text-green" ><i class="fas fa-check"></i></a>&nbsp;&nbsp;
                                                            <a href="{{url('approval/'.base64_encode('4/'.$v->id.'/'.$a->id.'/'.$a->email.'/web'))}}" title="Reject" class="btn-right text-red" ><i class="fas fa-times"></i></a>&nbsp;&nbsp;
                                                            <a href="#" onClick='showM("{{url('approval/remarks/'.base64_encode('5/'.$v->id.'/'.$a->id.'/'.$a->email.'/web'))}}");return false' title="Revision" class="btn-right text-yellow" ><i class="fas fa-file-edit"></i></a>&nbsp;&nbsp;
                                                        @elseif($v->status_id=='5')
                                                            <a href="{{url('document/'.$v->id)}}" title="Edit" class="btn-right text-primary" ><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach

                                            <a href="#" onClick='showM("{{url('document/'.$v->id.'/show')}}");return false' title="Show" class="btn-right text-secondary" ><i class="fas fa-eye"></i></a>&nbsp;&nbsp;

                                            <a href="{{url('document/detail/'.$v->id)}}" title="Detail" class="btn-right text-blue" ><i class="fas fa-list"></i></a>&nbsp;&nbsp;
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
