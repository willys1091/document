@php
    if($template=='1'){
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
    }elseif($template=='2'){
        if($param['btn']=='approval'){
            $button = "
        <a href='".url('approval/'.base64_encode('3/'.$param['doc_id'].'/'.$param['app_id'].'/'.$email.'/email'))."'
            style='
                    width: 100px;
                    height: 25px;
                    background: #28a745;
                    padding: 10px;
                    text-align: center;
                    border-radius: 5px;
                    color: white;
                    font-weight: bold;
                    line-height: 25px;
                    text-decoration:none;'>Apporove</a>
                    <a href='".url('approval/'.base64_encode('4/'.$param['doc_id'].'/'.$param['app_id'].'/'.$email.'/email'))."'
                style='
                        width: 100px;
                        height: 25px;
                        background: #c82333;
                        padding: 10px;
                        text-align: center;
                        border-radius: 5px;
                        color: white;
                        font-weight: bold;
                        line-height: 25px;
                        text-decoration:none;'>Reject</a>

                        <a href='".url('approval/'.base64_encode('5/'.$param['doc_id'].'/'.$param['app_id'].'/'.$email.'/email'))."'
                style='
                        width: 100px;
                        height: 25px;
                        background: #e0a800;
                        padding: 10px;
                        text-align: center;
                        border-radius: 5px;
                        color: white;
                        font-weight: bold;
                        line-height: 25px;
                        text-decoration:none;'>Revision</a>";
                        $msg = $msg .'<br>'. $button;
        }
    }

@endphp
{!!$msg!!}
