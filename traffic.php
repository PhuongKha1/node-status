<?php
include "lib/init.php";
include "lib/login.php";
exec("curl -s https://".$hostname."/api/v1/admin/stat/serverRank -b logined.cookie",$return);
$json=json_decode($return[0],true);
$text=$name.$trafficinfo."\n";
if($show_poweredby){
    $text.="Top sever dùng nhiều nhất trong ngày
------------------------------------";
}
$TongDungLuong = $json['data'][0]["total"];
for($i=0;$i<count($json['data']);$i++){
    $TongDungLuong =$TongDungLuong +  $json['data'][$i]["total"]." GB💥\n";;
}

for($i=0;$i<count($json['data']);$i++){
    $text.= "\n".$nodename."：".$json["data"][$i]["server_name"].
           "\n".$nodetotal."：".round($json["data"][$i]["total"], 7)." GB\n";
}



 $text.="\n\nTổng Dung Lượng Đã Dùng Trong Ngày:".$TongDungLuong;
send(make($chat_id,$text));
?>