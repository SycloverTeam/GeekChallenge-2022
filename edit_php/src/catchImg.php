<?php
if(!isset($_COOKIE['path'])){
    header("Location: /index.php");
    exit();
}else{
    $path = $_COOKIE['path'];
    if(!is_dir('upload/'.$path)){
        mkdir('upload/'.$path);
        chmod('upload/'.$path,0755);
    }
    function waf($str){
        $uri = parse_url($str, 5);
        $checklist = ['gif','jpg','png'];
        $ext = substr($uri,strpos($uri,".")+1);
        if(in_array($ext,$checklist)){
            return $uri;
        }
        return "";
    }

    if(isset($_GET['file_url'])){
            $contents = file_get_contents($_GET['file_url']);
            $ext = substr($_GET['file_url'], strrpos($_GET['file_url'], ".") + 1);
            $uri = waf($_GET['file_url']);
            if($uri !== ""){
                $file_name = substr($uri,''==strpos($uri,'/')?0:1,strpos($uri,'.')-(''==strpos($uri,'/')?0:1));
                file_put_contents('upload/'.$path.'/'.md5($file_name).'.'.$ext,$contents);
            }
    } else {
        echo "no resource!";
        header("Location: /index.php");
        show_source(__FILE__);
        exit();
    }
}
header("refresh: 0;url=/showImage.php");
echo "success";
?>
