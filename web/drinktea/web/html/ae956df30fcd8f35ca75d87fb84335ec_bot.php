<?php
error_reporting(0);
$a = array();
@exec("ls /qu35t10ns", $a);
@$url = pos($a);
print(base64_decode($url));