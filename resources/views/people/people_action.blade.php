@if($action=='add')
<form action="{{url('people/'.$modul)}}" method="post" role="form">
@else
<form action="{{ URL('people/'.$modul.'/'.$people->id) }}" method="post" role="form"> @method('patch')
@endif
@csrf
	<div class="modal-header">
		<h4 class="modal-title">{{ucwords($modul)}}</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
	    <div class="row">
	       	<div class="col-md-6">
	            <div class="form-group">
	                <label for="link">Email <span class='merah'>*</span></label>
	                 <input type="email" class="form-control" name="email" autocomplete="off" value='{{(($action=='edit')?$people->email:'')}}' required>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="form-group">
	                <label for="link">Name <span class='merah'>*</span></label>
	                 <input type="text" class="form-control" name="name" autocomplete="off" value='{{(($action=='edit')?$people->name:'')}}' required>
	            </div>
            </div>

            @if($modul=='user')
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="link">KTP </label>
                        <input type="text" class="form-control" name="ktp" value='{{(($action=='edit')?$people->ktp:'')}}'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="link">Phone </label>
                        <input type="text" class="form-control" name="phone" value='{{(($action=='edit')?$people->phone:'')}}'>
                    </div>
                </div>
            @else
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="link">Title <span class='merah'>*</span></label>
                         <input type="text" class="form-control" name="title" autocomplete="off" value='{{(($action=='edit')?$people->title:'')}}'>
                    </div>
                </div>
            @endif
	        <div class="col-md-8">
	            <div class="form-group">
	                <label for="link">Password <span class='merah'>*</span></label>
	                 <input type="password" class="form-control" name="password">
	            </div>
	        </div>
    	</div>
	</div>
	<div class="modal-footer">
	    <button type="button" class="btn btn-default cancel" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
	    <button type="submit" class="btn btn-success"><i class='fa fa-save'></i> Save</button>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function () {
		$('.select2bs4').select2({ theme: 'bootstrap4' })
		bsCustomFileInput.init();
	});
</script>
