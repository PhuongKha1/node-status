<?php
include "config.php";
include "lib/lang/".$lang.".php";
if($lang!=vietnamese && $lang!=english && $lang!=japanese)
{
	echo "Lang Error";
	exit(0);
}
if($argv[1]=="used"){
  include "used.php";
} else
if($argv[1]=="traffic"){
  include "traffic.php";
} else 
if($argv[1]=="help"){
	echo $allhelp;
} else
if($argv[1]=="user"){
  include "user.php";
} 
if($argv[1]=="TopThietBi"){
  include "TopThietBi.php";
}else 
{
  echo $help;
}
?>
