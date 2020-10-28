@extends('template')
@section('form')
<p class="login-box-msg">Enter Your new Password</p>
<form action="{{ url('reset') }}" method="post"> @csrf
    <input type='hidden' name="adminid" value="{{$admin_id}}">
    <input type='hidden' name="code" value="{{$code}}">
	<div class="input-group mb-3">
		<input type="password" class="form-control" placeholder="New Password" name="pass1" id='pass1' required>
		<div class="input-group-append">
			<div class="input-group-text"><span class="fas fa-lock-alt"></span></div>
		</div>
    </div>

    <div class="input-group mb-3">
		<input type="password" class="form-control" placeholder="Confirmation New Password" name="pass2" id='pass2' required>
		<div class="input-group-append">
			<div class="input-group-text"><span class="fas fa-lock-alt"></span></div>
		</div>
	</div>
	<div class="row">
		<div class="col-8"></div>
		<div class="col-4"><button type="submit" id="submit" class="btn btn-primary btn-block" disabled>Reset</button></div>
	</div>
</form>
<script type="text/javascript">
    $( document ).ready(function() {
       const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000
       });

       function check(notif){
            if($('#pass1').val()==$('#pass2').val()){
                $('#submit').attr("disabled", false);
                if(notif=='1'){
                    Toast.fire({
                        icon: "success",
                        title: "New Password and Confirmation Password are matched"
                    })
                }

            }else{
                $('#submit').attr("disabled", true);
                if(notif=='1'){
                    Toast.fire({
                        icon: "error",
                        title: "New Password dan Confirmation Password Are not matched"
                    })
                }
            }
        }

        $('#pass1').blur(function(){
            if($('#pass2').val()!=''){
                check('1');
            }
        });

        $('#pass2').blur(function(){
            if($('#pass1').val()!=''){
                check('1');
            }
        });

        $('#pass2').keyup(function(){
            if($('#pass1').val()!=''){
                check('0');
            }
        });
    });
   </script>
@stop

