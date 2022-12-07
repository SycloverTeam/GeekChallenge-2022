<?php
error_reporting(0);
if(isset($_GET['file'])){
    $file = $_GET['file'];
    $file = str_replace(array("http://","https://"),"", $file);
    $file = str_replace(array("../","..\""),"", $file);
    print_r($file.".html");
    echo "<br>";
    include($file.".html");
}
else{
    echo "你不传个file我怎么知道你要干嘛-_-";
}