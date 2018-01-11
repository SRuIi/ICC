<?php
    function dom(){
        $uri = 'http://www.6btc.com/coinmarketcap/crycurrencies';
        $ch = curl_init ();
        // print_r($ch);
        $date=time();
        $data=('updateAt'=>$date);
        curl_setopt ( $ch, CURLOPT_URL, $uri );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        file_put_contents("F:/dom.txt",$return);  
    }

    set_time_limit(0);  //设置执行时间，单位是秒。0表示不限制。
    date_default_timezone_set('Asia/Beijing');//设置时区
    while(TRUE)
    {   
        $time=60;
        dom();
        //这里是需要定时执行的任务
        sleep($time);//暂停时间（单位为秒）
    }
?>