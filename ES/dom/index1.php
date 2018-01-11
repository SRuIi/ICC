<?php
function html(){
    error_reporting(E_ALL || ~E_NOTICE);
    header("Content-type: text/html; charset=utf-8"); 
    //var_dump($str);
    $html="";
    $html='<!DOCTYPE html>
    <head>
        <title>互联现金</title>
        <meta http-equiv="content-Type" content="text/html" charset="UTF-8">
        <meta name="Description" content="互联现金" />
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.css"/>

        <link href="http://www.6btc.com/static/css/bootstrap.css" rel="stylesheet">
        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/font-awesome/4.0.1/css/font-awesome.min.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-use.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-style.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/common/common-animation.css" rel="stylesheet">
        <link href="http://www.6btc.com/static/css/lib/jquery-notify.css" rel="stylesheet"/>
        
        <link type="image/x-icon" href="http://www.6btc.com/static/images/ico/favicon.ico" rel="shortcut icon"/>

        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.bootcss.com/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>
        <!-- Latest compiled and minified Locales -->
        <script src="http://www.6btc.com/static/script/lib/bootstrap-table-zh-CN.min.js"></script>
        <script src="https://cdn.bootcss.com/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="https://cdn.bootcss.com/backbone.js/1.3.3/backbone-min.js"></script>
        <script src="http://www.6btc.com/static/script/lib/jquery-notify.js"></script>

        <script src="http://www.6btc.com/static/script/base/customFunc.js"></script>
        <script src="http://www.6btc.com/static/script/base/customFormatFunc.js"></script>
        
        <style>
            #cryptocurrency-trade-coinmarket tr{border-top:1px solid #eee;height:60px;}
            thead{height:120px;}
            tbody tr td{text-align:left;}
        </style>
       
       
    </head>';


 $html.='
    <body>
        <div style="background-color:#fff;margin:20px auto;box-shadow: 2px 2px 2px #f8f8f8;width:1400px;">
            <div style="width:1100px;margin:0 auto;padding-top:120px;padding-bottom:120px;">
                <table id="cryptocurrency-trade-coinmarket" class="table-no-bordered table-border">
                    <thead>
                        <tr>
                            <th class="table-border-th id" style="text-align:left;width:75px" data-field="id" tabindex="0">
                                <div class="th-inner sortable both">市值</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th rank" style="text-align:left;width:240px" data-field="rank" tabindex="0">
                                <div class="th-inner sortable both">名称</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th symbol" style="text-align:left;width:60px" data-field="symbol" tabindex="0">
                                <div class="th-inner sortable both">缩写</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th priceBtc" style="text-align:left;width:150px" data-field="priceBtc" tabindex="0">
                                <div class="th-inner sortable both">价格(BTC)</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th priceCny" style="text-align:left;width:150px" data-field="priceCny" tabindex="0">
                                <div class="th-inner sortable both">价格(CNY)</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th volumeCny24h" style="text-align:left;width:150px" data-field="volumeCny24h" tabindex="0">
                                <div class="th-inner sortable both">日成交量</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th marketCapCny" style="text-align:left;width:150px" data-field="marketCapCny" tabindex="0">
                                <div class="th-inner sortable both">流通市值</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th percentChange24h" style="text-align:left;width:85px" data-field="percentChange24h" tabindex="0">
                                <div class="th-inner sortable both">日涨幅</div>
                                <div class="fht-cell"><div>
                            </th>
                            <th class="table-border-th percentChange7d" style="text-align:left;width:80px" data-field="percentChange7d" tabindex="0">
                                <div class="th-inner sortable both">7日涨幅</div>
                                <div class="fht-cell"><div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>';
                    //从本地读取文件
                    $json=file_get_contents("D:/soft/wamp/www/ICC/che/dom.txt");
                    $arr=json_decode($json,true);
                    //var_dump($arr);
                        foreach($arr as $k=>$v){
                            $html.='<tr class="table-row-td-floatShadowHover" data-index="0" data-uniqueid="bitcoin">
                                <td class="table-border-th rank" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align:left; width: 75px; ">';
                                $html.=$v["rank"];$html.='</td>

                                <td class="table-border-th id" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 200px; ">
                                    <div style="width: 100%">
                                        <div style="display: inline-block;width: 120px;padding-left: 8px;text-align:left;">
                                            <img src="https://bitinfo-pic-16-16.oss-cn-hangzhou.aliyuncs.com/';$html.=$v["id"];$html.='.png" class="currency-logo" alt="bitcoin">&nbsp;&nbsp;';$html.=$v["nameEN"];
                                          
                                         $html.='</div>                                       
                                    </div>
                               </td>';

                                $up= strtoupper($v["symbol"]);
                                $html.='<td class="table-border-th symbol" style="text-align:left;border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; width: 90px; ">';
                                $html.=$up;
                                $html.='</td>';

                                $html.='<td class="table-border-th priceBtc" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; ">
                                <div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: left;"><i class="fa fa-bitcoin"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                               

                                $html.=$v["priceBtc"];
                             

                                $html.='</span></div></td>';
                                
                                $html.='<td class="table-border-th priceCny dropDown" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 140px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;" \'="">';
                                if($v["priceCny"]>=1){
                                    $cny=round($v["priceCny"],2);
                                    $html.=$cny;
                                }else{
                                   $html.=$v["priceCny"]; 
                                }
                                
                                $html.='</span></div></td>';

                                if(!empty($v["volumeCny24h"])){
                                    if($v["volumeCny24h"]>=100000000){
                                        $html.='<td class="table-border-th volumeCny24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left";>';
                                        $cny=$v["volumeCny24h"]/100000000;
                                        $cny=round($cny,2);
                                        $html.=$cny;
                                        $html.='&nbsp;亿</span></div></td>';
                                    }else{
                                        $html.='<td class="table-border-th volumeCny24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 130px; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left";>';
                                        $cny=$v["volumeCny24h"]/10000;
                                        $cny=round($cny,2);
                                        $html.=$cny;
                                        $html.='&nbsp;万</span></div></td>';
                                    }
                                }else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }  
                                if(!empty($v["marketCapCny"])){
                                    if($v["marketCapCny"]>=1000000000){
                                        $html.='<td class="table-border-th marketCapCny" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                                        $maket=$v["marketCapCny"]/100000000;
                                        $maket=round($maket,2);
                                        $html.=$maket;
                                        $html.='&nbsp;亿</span></div></td>';
                                    }else{
                                        $html.='<td class="table-border-th marketCapCny" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; "><div style="width:100%;text-align:left;padding-left: 8px;"><span style="display: inline-block;text-align: center;"><i class="fa fa-cny"></i>&nbsp;</span><span style="display: inline-block;text-align: left;">';
                                        $maket=$v["marketCapCny"]/10000;
                                        $maket=round($maket,2);
                                        $html.=$maket;
                                        $html.='&nbsp;万</span></div></td>';
                                    }
                                } 
                                else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }  
                                if(!empty($v["percentChange24h"])){
                                    switch($v["percentChange24h"])
                                        {
                                        case $v["percentChange24h"]>0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:green;"><span style="text-align: left;">';
                                         $html.=$v["percentChange24h"];   
                                         $html.='%</span></div></td>'; 
                                         break;
                                        case $v["percentChange24h"]<0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:red;"><span style="text-align: left;">';
                                         $html.=$v["percentChange24h"];   
                                         $html.='%</span></div></td>';
                                         break;
                                        
                                        }  
                                }else{
                                     $html.='<td style="padding-left:16px;">—</td>';
                                }
                                if(!empty($v["percentChange7d"])){                       
                                    switch($v["percentChange7d"])
                                        {
                                        case $v["percentChange7d"]>0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:green;"><span style="text-align: left;">';
                                         $html.=$v["percentChange7d"];   
                                         $html.='%</span></div></td>'; 
                                         break;
                                        case $v["percentChange7d"]<0:
                                         $html.='<td class="table-border-th percentChange24h" style="border-top: 1px solid #ddd; height: 45px; color: #4c4949; font-weight: 400; cursor: pointer; text-align: left; width: 85px; "><div style="width:100%;text-align:left;font-size: 15px;padding-left: 8px;color:red;"><span style="text-align: left;">';
                                         $html.=$v["percentChange7d"];   
                                         $html.='%</span></div></td>';
                                         break;
                                    
                                        }  
                                }else{
                                    $html.='<td style="padding-left:16px;">—</td>';
                                }



                                 

                        $html.='</tr>';
                        
                    }
                    $html.='

                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
';  
    
    echo $html;
}
html();