<?php

function  uuid()  
{  
    $chars = md5(uniqid(mt_rand(), true));  
    $uuid = substr ( $chars, 0, 8 ) . '-'
            . substr ( $chars, 8, 4 ) . '-' 
            . substr ( $chars, 12, 4 ) . '-'
            . substr ( $chars, 16, 4 ) . '-'
            . substr ( $chars, 20, 12 ); 
    return $uuid ;  
}  

if(!isset($_COOKIE['path'])){
    setcookie('path',uuid());
    header("refresh: 2;");
    echo "创建成功";
}else{
    header("Location:/showImage.php");
}
?>
