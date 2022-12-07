<?php
error_reporting(0);
include_once ("flag.php");
highlight_file(__FILE__);
$sleeptime=$_GET['SleepTime'];
if(isset($sleeptime))
{
	if(!is_numeric($sleeptime))
	{
		echo '时间是一个数字啊喂！';
	}
	else if($sleeptime < 86400 * 30)
	{
		echo '这点时间哪够Canzik学长睡啊';
	}
	else if($sleeptime > 86400 * 60)
	{
		echo '别让Canzik学长睡死在这啊！';
	}
	else
	{
		echo '<br/>Canzik学长很满足,表示这次把这辈子的觉都睡完啦！flag在这,自己拿吧:<br/>';
		sleep((int)$sleeptime);
		echo $flag;
	}
}
?>