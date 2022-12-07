<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}

$path = '/U5ers1nf0_95279527/';

$dish = strval($_GET['dish']);

$info = explode('|', file_get_contents($path.$_SESSION['username']));
$_SESSION['money'] = $info[1];
$_SESSION['vip'] = $info[2];

function show_img($img) {
    echo "<img src=\"lib/img/{$img}\"/>"."<br>";
}

if ($dish === 'changfen') {
    if ($_SESSION['money'] >= 6) {
        $_SESSION['money'] -= 6;
        @file_put_contents($path.$_SESSION['username'], join("|", [$_SESSION['password'], $_SESSION['money'], $_SESSION['vip']]));

        show_img('changfen.jpg');
        echo '肠粉给你了，赶紧趁热吃';
    } else {
        echo '钱不够捏，要15元';
    }
}

if ($dish === 'fengzhua') {
    if ($_SESSION['money'] >= 10) {
        $_SESSION['money'] -= 10;
        @file_put_contents($path.$_SESSION['username'], join("|", [$_SESSION['password'], $_SESSION['money'], $_SESSION['vip']]));

        show_img('fengzhua.jpg');
        echo '你的凤爪，赶紧趁热吃';
    } else {
        echo '钱不够捏，要25元';
    }
}

if ($dish === 'pdsrzhou') {
    if ($_SESSION['money'] >= 12) {
        $_SESSION['money'] -= 12;
        @file_put_contents($path.$_SESSION['username'], join("|", [$_SESSION['password'], $_SESSION['money'], $_SESSION['vip']]));

        show_img('pdsrzhou.jpg');
        echo '你的皮蛋瘦肉粥，赶紧趁热吃';
    } else {
        echo '钱不够捏，要20元';
    }
}

if ($dish === 'spspnai') {
    if ($_SESSION['vip'] == 1) {
        if ($_SESSION['money'] >= 999999999999) {
            $_SESSION['money'] -= 999999999999;
            @file_put_contents($path.$_SESSION['username'], join("|", [$_SESSION['password'], $_SESSION['money'], $_SESSION['vip']]));

            show_img('spspnai.jpg');
            echo '你尝了一口这酥皮双皮奶，难吃死了，老板为了补偿你，给了你一面小旗子：<br>SYC{Dr1nk_V1P_t3a_4nd_3nj0y_C5RF}';
        } else {
            echo '钱不够捏，要999999999999元';
        }
    } else {
        echo '对不起，只有尊贵的会员才能购买';
    }
}