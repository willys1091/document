@php
    $msg = str_replace("{title}",$subject,$msg);
    $msg = str_replace("{name}",ucwords($name),$msg);

    if($mailname=='password reset'){
        $msg = str_replace("{resetlink}",url('reset/'.$reset),$msg);
    }elseif($mailname=='interview'){
        $msg = str_replace("{day}",$day,$msg);
        $msg = str_replace("{date}",$date,$msg);
        $msg = str_replace("{time}",$time,$msg);
        $msg = str_replace("{position}",$position,$msg);
        $msg = str_replace("{interviewer}",ucwords($interviewer),$msg);
    }
@endphp
{!!$msg!!}
