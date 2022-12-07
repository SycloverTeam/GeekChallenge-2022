<?php
function exif_imagetype($filename){
    $content = file_get_contents($filename);
    if(preg_match("/^GIF89a.*/i",$content)){
        return "GIF";
    }
    if(preg_match("/^PNG.*/i",$content)){
        return "PNG";
    }


}