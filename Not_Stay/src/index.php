<?php
//简单的实现文件头检测
include_once('waf.php');
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
$safe_header = '<?php exit();?>';
if(!isset($_COOKIE['path'])){
    setcookie('path',uuid());
    exit();
}
$path = './upload/'.$_COOKIE['path'].'/';
if(!is_dir($path)){
    mkdir($path);
    chmod($path,0755);
}
$file_data = $_POST['data'];
$filename = $_POST['filename'];
if(isset($_POST['data'])){
    file_put_contents('/tmp/'.$_COOKIE['path'].'.x',$file_data);#比赛这里的镜像忘了加后缀x，导致可以非预期
    $file_type = exif_imagetype('/tmp/'.$_COOKIE['path'].'.x');
    if($file_type != "GIF" && $file_type != "PNG"){
        die('nonono');
    }
}else{
    echo "I need data";
}
if(isset($_POST['filename'])){
    file_put_contents($filename,$safe_header.$file_data);
} else {
    echo "I need name";
}
show_source(__FILE__);
?>