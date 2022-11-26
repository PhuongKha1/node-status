<?php
include "lib/init.php";
include "lib/login.php";
exec("curl -s https://".$hostname."/api/v1/admin/server/manage/getNodes -b logined.cookie",$return);
$json=json_decode($return[0],true);
if($show_poweredby){
}

for($i=0;$i<count($json['data']);$i++){
    if($json['data'][$i]['show']!=null){
        if($json['data'][$i]['parent_id']==null){
            if($json['data'][$i]['online']==null){
		    if($json['data'][$i]['availale_status']==null){
                $text.="\n ".$json['data'][$i]['name']." ".$shit;
			    } else {
		   	 $text.="\n".$json['data'][$i]['name']." ".": 0".$onlinetext;
		    }
            } else {
                $DemSoLuong.="\n ".$json['data'][$i]['name']." ".": ".$json['data'][$i]['online'].$onlinetext;
               
                $text = $name."\n".$usedtext.$DemSoLuong;
            }
        } else {
		
            if($json['data'][$json['data'][$i]['parent_id']]['online']==null){
		    if($json['data'][$i]['availale_status']==null){
                $text.="\n  ".$json['data'][$i]['name']." ".$shit;
			    } else {
		   	 $text.="\n ".$json['data'][$i]['name']." ".": 0".$onlinetext;
		    }
            } else {
                $text.="\n ".$json['data'][$i]['name']." ".": ".strval($json['data'][strval($json['data'][$i]['parent_id'])]['online']).$onlinetext;
            }
        }
    }
}

 $text.="\n------------------------------------\n🚀--- VPNDATA.SHOP---🚀\n👉 ANDROID: V2rayNG , V2FlyNG\n👉 IOS: Shadowrocket  .\n👉 Thanh toán MoMo | ATM tự động \n👉 Thanh Toán CARD \n👉  Website: https://vpndata.shop/";

send(make($chat_id,$text));
?>