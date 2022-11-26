<?php
include "lib/init.php";
include "lib/login.php";
exec("curl -s https://".$hostname."/api/v1/admin/stat/userRank -b logined.cookie",$return);
$json=json_decode($return[0],true);
$text=$name.$trafficinfo."\n";
if($show_poweredby){
    $text.="💥 TOP 10 Người Dùng Nhiều Nhất Trong Ngày 💥
------------------------------------";
}
for($i=0;$i<count($json['data']);$i++){
    $text.= "\n".$username."：".$json["data"][$i]["email"].
           "\n".$nodetotal."：".round($json["data"][$i]["total"]/ 1073741824, 2)." GB\n";
}

// $text.="\n\n💥 Tổng Dung Lượng Đã Dùng: ".$TongDungLuong;
 
send(make($chat_id,$text));
?>