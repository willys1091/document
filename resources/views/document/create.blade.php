@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb')
	<section class="content">
        <form action="{{url('document')}}" method="post" role="form" id="form" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">@csrf
		<div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
					<div class="card-body">
                        <div class="form-group">
                            <label for="name">To <span class='merah'>*</span></label>
                            {{-- <input type="text" class="form-control" name="name" required> --}}
                            <select class="form-control select2tags select2-hidden-accessible"  name="to[]" style="width: 100%;" multiple>
                                <option>&nbsp;</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">CC <span class='merah'>*</span></label>
                            <select class="form-control select2tags select2-hidden-accessible"  name="cc[]" style="width: 100%;" multiple>
                                <option>&nbsp;</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject <span class='merah'>*</span></label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Division <span class='merah'>*</span></label>
                                    <select class="form-control select2bs4" name="division" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="">&nbsp;</option>
                                        @foreach($division as $d)
                                            <option value='{{$d->id}}'>{{$d->name}}</option>
                                        @endforeach
						            </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Document Type <span class='merah'>*</span></label>
                                    <select class="form-control select2bs4" name="doctype" style="width: 100%;" tabindex="-1" aria-hidden="true" required>
                                        <option value="">&nbsp;</option>
                                        @foreach($doctype as $dt)
                                            <option value='{{$dt->id}}'>{{$dt->name}}</option>
                                        @endforeach
						            </select>
                                </div>
                            </div>
                        </div>

					</div>
                </div>
                <div class="card card-primary card-outline">
					<div class="card-body">
                        <label for="name">Message <span class='merah'>*</span></label>
                        <textarea class="form-control summernote" id="message" name="message"></textarea>
                        <div class="form-group">
                            {{-- <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i> Attachment<input type="file" name="attachment">
                            </div>
                            <p class="help-block">Max. 32MB</p> --}}
                            <input id="userfile" name="userfile[]" type="file" multiple>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-paper-plane"></i> Submit</button>@method('post')
                        <button type="submit" class="btn btn-info float-right"><i class="fab fa-firstdraft"></i> Save as Draft</button>@method('post')
                    </div>
                </div>
            </div>
        </form>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('.select2bs4').select2({ theme: 'bootstrap4' })
		bsCustomFileInput.init();

        $("#userfile").fileinput({
            theme: "fas",
            showCaption: false,
            dropZoneEnabled: false,
            allowedFileTypes: ["image", "pdf"],
            maxFileSize: 10000,
            browseLabel: " Attach Files",
        });
	});
    $(function() { $(".select2tags").select2({tags: true}); });

</script>
@stop
