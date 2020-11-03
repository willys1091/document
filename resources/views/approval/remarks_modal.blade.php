<form action="{{url('approval/remarks')}}" method="post" role="form">@csrf
    <input type="hidden" name='source' value='web'>
    <input type="hidden" name='param' value='{{$param}}'>
	<div class="modal-header">
		<h4 class="modal-title">{{ucwords($modul)}} {{$docno}}</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
        <div class="form-group">
            <label for="link">Remarks <span class='merah'>*</span></label>
            <textarea class="form-control summernote"  name="remarks"></textarea>
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
        $('.summernote').summernote({height: 200});
	});
</script>
