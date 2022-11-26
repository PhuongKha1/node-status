<?php
include "lib/init.php";
include "lib/login.php";
exec("curl -s https://".$hostname."/api/v1/admin/stat/node/terminalConnections -b logined.cookie",$return);
$json=json_decode($return[0],true);
$text=$name.$trafficinfo."\n";
if($show_poweredby){
    $text.="💥 TOP Tài Khoản Có Thiết Bị Sử Dụng Nhiều Nhất 💥
------------------------------------";
}
for($i=0;$i<count($json['data']);$i++){
    $text.= "\n".$username.": ".$json["data"][$i]["email"].
           "\n".$thietbidasudung.": ".round($json["data"][$i]["connections"])." Thiết Bị\n";
}


 
send(make($chat_id,$text));
?>