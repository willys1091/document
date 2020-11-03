@extends('template')
@section('form')
<p class="login-box-msg">Remarks Revision</p>
<form action="{{url('approval/remarks')}}" method="post" role="form">@csrf
    <input type="hidden" name='source' value='email'>
    <input type="hidden" name='param' value='{{$param}}'>
	<div class="input-group mb-6">
		<div class="form-group">
            <label for="link">Remarks <span class='merah'>*</span></label>
            <textarea class="form-control summernote"  name="remarks"></textarea>
        </div>
	</div>

	<div class="row">
		<div class="col-8"></div>
		<div class="col-4"><button type="submit" class="btn btn-primary btn-block">Save</button></div>
	</div>
</form>
@stop

