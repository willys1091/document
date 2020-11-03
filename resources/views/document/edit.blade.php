@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb')
	<section class="content">
        <form action="{{ url('document/'.$document->id)}}" role="form" enctype="multipart/form-data"method="POST" onsubmit="submit.disabled = true; return true;">@method('PATCH')
        @csrf
        <input type="hidden" name="docno" value="{{$document->doc_no}}">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary card-outline">
					<div class="card-body">
                        <div class="form-group">
                            <label for="name">To <span class='merah'>*</span></label>
                            <select class="form-control select2tags select2-hidden-accessible"  name="to[]" id="to[]" style="width: 100%;" multiple>
                                @foreach($approval as $a)
                                    @if($a->type=='To')
                                        <option value="{{$a->email}}" selected>{{$a->email}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">CC <span class='merah'>*</span></label>
                            <select class="form-control select2tags select2-hidden-accessible"  name="cc[]" id="cc" style="width: 100%;" multiple>
                                @foreach($approval as $a)
                                @if($a->type=='CC')
                                    <option value="{{$a->email}}" selected>{{$a->email}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Subject <span class='merah'>*</span></label>
                            <input type="text" class="form-control" name="subject" value="{{$document->title}}" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Division <span class='merah'>*</span></label>
                                    <select class="form-control select2bs4" name="division" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">&nbsp;</option>
                                        @foreach($division as $d)
                                            <option value='{{$d->id}}' {{$document->division_id==$d->id?'selected':''}}>{{$d->name}}</option>
                                        @endforeach
						            </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Document Type <span class='merah'>*</span></label>
                                    <select class="form-control select2bs4" name="doctype" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                                        <option value="">&nbsp;</option>
                                        @foreach($doctype as $dt)
                                            <option value='{{$dt->id}}' {{$document->doctype_id==$dt->id?'selected':''}}>{{$dt->name}}</option>
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
                        <textarea class="form-control summernote" id="message" name="message">{{htmlspecialchars_decode($document->message)}}</textarea>
                        <div class="form-group">
                            <input type="file" name="userfile[]" multiple>
                            {{-- <div class="btn btn-default btn-file">
                                <i class="fas fa-paperclip"></i> Attachment<input type="file" name="userfile[]" multiple>
                            </div>
                            <p class="help-block">Max. 32MB</p> --}}

                            {{-- <input id="userfile" name="userfile[]" type="file" multiple>
                            <div id="errorBlock" class="help-block"></div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right submit"><i class="fa fa-paper-plane"></i> Submit</button>

                    </div>
                </div>
            </div>
        </form>
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function () {
        $("#draft").click(function(){
            var to = $("#to").val();
			$.ajax({
				type: "POST",
				url: "{{url('document/draft')}}",
				data: {'_token': "{{ csrf_token() }}",'to': to},
				cache: false,
				success: function(html){
					$("#department").html(html);
				}
			});
		});

		$('.select2bs4').select2({ theme: 'bootstrap4' })
		bsCustomFileInput.init();

        $("#userfile").fileinput({
            theme: "fas",
            showCaption: false,
            dropZoneEnabled: false,
            browseOnZoneClick: true,
            showRemove: false,
            showUpload: false,
            allowedFileTypes: ["image", "pdf"],
            maxFileSize: 10000,
            browseLabel: " Attach Files",
            uploadUrl: "{{url('document/store')}}",
            enableResumableUpload: true,
            initialPreviewAsData: true,
            elErrorContainer: "#errorBlock"
        });

        $(".submit").on("click", function() {
            $("#userfile").fileinput('upload');
        });
	});
    $(function() { $(".select2tags").select2({tags: true}); });

</script>
@stop