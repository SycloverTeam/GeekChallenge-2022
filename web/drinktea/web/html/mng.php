<?php
error_reporting(0);
session_start();
$path = '/U5ers1nf0_95279527/';
$ip = $_SERVER['REMOTE_ADDR'];

echo "只有狮吼功继承人才能更改VIP权限，用法示例：\n?name=f4tb3e&vip=true";

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');location.href='mng.php'</script>");
}

if(!isset($_SESSION['username']) && $ip !== "172.20.0.2"){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}

$user = $_GET['name'];
$vip_v = $_GET['vip'];

if(isset($_GET['name']) && isset($_GET['vip'])){
    if($ip === "172.20.0.2") {
        if($user != '' && $vip_v != '') {
            $str = $user.$vip_v;
            if(!preg_match('/[^A-Za-z0-9]/i', $str)) {
                if(in_array($user, scandir($path))) {
                    $userinfo = explode('|', file_get_contents($path.$user));
                    if($vip_v == "true") {
                        @file_put_contents($path.$user, join('|', [$userinfo[0], strval(intval($userinfo[1])), "1"]));
                    }
                    if($vip_v == "false") {
                        @file_put_contents($path.$user, join('|', [$userinfo[0], strval(intval($userinfo[1])), "0"]));
                    }
                }
            }
        }
    } else {
        show_err("Error!", "只有狮吼功继承人有这个权力");
    }
}
?>