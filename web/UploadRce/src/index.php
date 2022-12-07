<!DOCTYPE html>
<html>
<head>
	
   <title>Can you find swp?</title>
   <body>
      <p style="color:rgb(255, 255, 255);">Welcome to GeekChallenge2022</p>
      <div style="left: 725px; position: absolute; top: 200px;color:rgb(255, 255, 255);">
      <font size="6">Try to find some info</font> 
   </div>
      <img src="security.png">
   </body>
</head>
</html>


<?php
if(!isset($_GET['option'])) die();
$str = addslashes($_GET['option']);

if($str != NULL){
   echo ':Where is the source code of config.php?';
   }   

$file = file_get_contents('./config.php');
$file = preg_replace('|\$option=\'.*\';|', "\$option='$str';", $file);
file_put_contents('./config.php', $file); 

