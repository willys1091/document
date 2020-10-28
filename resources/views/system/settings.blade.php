@extends('template')
@section('content')
<div class="content-wrapper">
@include('breadcrumb')
	<section class="content">
		<div class="row">
			<div class="col-12 col-sm-12 col-lg-12x">
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#general" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">General</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#email" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Email</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#trans" role="tab" aria-controls="custom-tabs-three-trans" aria-selected="false">Transaction</a>
                            </li>
                            <li class="nav-item">
								<a class="nav-link" data-toggle="pill" href="#status" role="tab" aria-controls="custom-tabs-three-status" aria-selected="false">Status</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content" id="custom-tabs-three-tabContent">
							<div class="tab-pane fade show active" id="general" role="tabpanel" >
								 <form class="form-horizontal" method="POST" action="{{url('general')}}">@csrf
									<div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Title</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="title" value="{{$config['title']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Application Name as it appears throughout the system</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Tagline</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="tagline" value="{{$config['tagline']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">In a few words, explain what this site is about.</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="address" value="{{$config['address']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">This address is used for Web Information.</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Phone</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="phone" value="{{$config['phone']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">This address is used for Web Information.</p>
					                	</div>
					                </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Administration Email Address</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="admin_email" value="{{$config['admin_email']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">This address is used for admin purposes.</p>
					                	</div>
					                </div>
					                <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Timezone</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="timezone" value="{{$config['timezone']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Choose either a city in the same timezone as you  time offset.</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
					                		<button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>
					                	</div>
                                    </div>
								</form>
							</div>
							<div class="tab-pane fade" id="email" role="tabpanel">
								<form class="form-horizontal" method="POST" action="{{url('email')}}">@csrf
					                <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Email From</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="email_from" value="{{$config['email_from']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Email From as it appears throughout the email</p>
					                	</div>
					                </div>
					                 <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Name From</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="name_from" value="{{$config['name_from']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Name From as it appears throughout the email</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
					                		<button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>
					                	</div>
                                    </div>
								</form>
							</div>
							<div class="tab-pane fade" id="trans" role="tabpanel">
                                <form class="form-horizontal" method="POST" action="{{url('trans')}}">@csrf
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Admin Percent</label>
										<div class="col-sm-4">&emsp;&nbsp;
											<input type="checkbox" class="form-check-input admin_percent" name="admin_percent" {{$config['admin_percent']=='1'?'checked':''}}>
					                	</div>
					                </div>
									<div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Admin Fee</label>
										<div class="col-sm-4">
											<input type="text" class="form-control {{$config['admin_percent']=='1'?'percent':'money'}} admin_fee" name="admin" value="{{$config['admin']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Admin Fee for Transaction</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Interest Percent</label>
										<div class="col-sm-4">&emsp;&nbsp;
											<input type="checkbox" class="form-check-input interest_percent" name="interest_percent" {{$config['bunga_percent']=='1'?'checked':''}}>
					                	</div>
					                </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Interest Fee</label>
										<div class="col-sm-4">
											<input type="text" class="form-control {{$config['bunga_percent']=='1'?'percent':'money'}} interest_fee" name="bunga" value="{{$config['bunga']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Interest Fee for Transaction in Percent</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
										<label for="name" class="col-sm-2 col-form-label">Minimun Transaction</label>
										<div class="col-sm-4">
											<input type="text" class="form-control money" name="minimal_transaction" value="{{$config['minimal_transaction']}}" required>
					                	</div>
					                	<div class="col-sm-6">
					                		<p class="help-block">Minimun Transaction</p>
					                	</div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
					                		<button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>
					                	</div>
                                    </div>
								</form>
							</div>
							<div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
							Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script type="text/javascript">
    $(".interest_percent").click( function(){
        if($(this).is(':checked')){
            $(".interest_fee").removeClass('money').addClass('percent');
        }else{
            $(".interest_fee").removeClass('percent').addClass('money');
        }
    });
    $(".admin_percent").click( function(){
        if($(this).is(':checked')){
            $(".admin_fee").removeClass('money').addClass('percent');
        }else{
            $(".admin_fee").removeClass('percent').addClass('money');
        }
    });
</script>
@stop
