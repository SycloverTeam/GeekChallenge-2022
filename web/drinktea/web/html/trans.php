<?php
error_reporting(0);
session_start();
sleep(2);

$path = '/U5ers1nf0_95279527/';
$ip = $_SERVER['REMOTE_ADDR'];

if(!isset($_SESSION['username']) && $ip !== "172.20.0.2"){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');history.back()</script>");
}

function transfer($path,$fuser,$tuser,$money){
    $fuserinfo = explode('|',file_get_contents($path.$fuser));
    $tuserinfo = explode('|',file_get_contents($path.$tuser));

    @file_put_contents($path.$fuser, join('|',[$fuserinfo[0], $_SESSION['money'], $fuserinfo[2]]));
    @file_put_contents($path.$tuser, join('|',[$tuserinfo[0], strval(intval($tuserinfo[1])) + $money, $tuserinfo[2]]));
}

if(isset($_POST['username']) && isset($_POST['money'])) {
    $tg_user = strval($_POST['username']);
    $money = strval($_POST['money']);

    if($tg_user == '' || $money == '') {
        show_err("Error!", "你是不是有什么没填...");
    }

    if(preg_match('/[^A-Za-z0-9]/i', $tg_user) || preg_match('/[^0-9]/i', $money)) {
        show_err("Error!", "转账目标只能含字母和数字，金额只能含数字");
    }

    if($money <= 0) {
        show_err("Error!", "转账金额错误");
    }

    if(!in_array($tg_user, scandir($path))) {
        show_err("Error!", "用户 [{$tg_user}] 不存在");
    }

    if($tg_user == $_SESSION['username']) {
        show_err("Error!", "别乱搞乱的");
    }

    if($ip === "172.20.0.2") {
        $tuserinfo = explode('|',file_get_contents($path.$tg_user));
        @file_put_contents($path.$tg_user, join('|', [$tuserinfo[0], strval(intval($tuserinfo[1])) + $money, $tuserinfo[2]]));
        exit();
    }

    if($_SESSION['money'] >= $money) {
        $_SESSION['money'] -= $money;
        transfer($path, $_SESSION['username'], $tg_user, $money);
        header("Location: wait.php");
    } else {
        show_err("Error!", "余额不足");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>WeeLin的早茶铺子 - 转账</title>

    <!-- Default Styles (DO NOT TOUCH) -->
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/fonts.css">
    <link rel="stylesheet" href="lib/css/opacity-admin.css"/>

    <!-- Adjustable Styles -->
    <link rel="stylesheet" href="lib/css/opacity-sliders.css"/>
    <link rel="stylesheet" href="lib/css/icheck.css">
    <link rel="stylesheet" href="lib/css/summernote.css">
    <link rel="stylesheet" href="lib/css/summernote-bs3.css">
    <link rel="stylesheet" href="lib/css/select2.css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="lib/js/html5shiv.js"></script>
    <script src="lib/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="contain">

    <div class="left hidden-xs">
        <div class="sidebar">
            <div class="accordion">
                <div class="accordion-group">
                    <div class="accordion-heading"><a class="sbtn" href="index.php"><span
                                class="fa fa-home"></span><span class="full">主页</span></a></div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading"><a class="sbtn" href="order.php"><span
                                class="icon icon-cutlery"></span><span class="full">点餐</span></a></div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading"><a class="sbtn" href="trans.php"><span
                                    class="icon icon-transfer"></span><span class="full">转账</span></a></div>
                </div>
                <div class="accordion-group">
                    <div class="accordion-heading"><a class="sbtn" href="report.php"><span
                                class="fa fa-comment"></span><span class="full">反馈</span></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="right">

        <div class="col-md-12">
            <div class="logo"><img id="logo" src="lib/img/logo3.png"></div>
            <div class="logoxs"><img id="logo" src="lib/img/logo_sm.png"></div>
            <div class="nav">
                <div class="hov">
                    <div class="btn-group">
                        <a class="con" href="" data-toggle="dropdown"><span class="fa fa-user"></span></a>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li class="profile">
                                <div class="pic"><img src="lib/img/avatars/0.png"></div>
                                <div class="profile-info">
                                    你好，<?=$_SESSION['username']?>
                                </div>
                            </li>
                            <li class="linked bottom"><a href="logout.php"><span class="fa fa-reply"></span>退出登录</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN PAGE CONTENT -->
        <div class="content">

            <!-- BREADCRUMBS -->
            <div id="bread" class="col-md-12">
                <div class="crumbs">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="#">WeeLin的早茶铺子</a></li>
                        <li class="active">转账</li>
                    </ol>
                </div>
            </div>
            <div id="response" class="col-md-12">
                <div class="rep">
                    <div style="float:right;" class="hov">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="fa fa-bars"></span> 导航 <span class="caret"></span></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li class="linked"><a href="index.php"><span class="fa fa-home"></span><span
                                            class="full">主页</span></a></li>
                                <li class="linked"><a href="order.php"><span class="icon icon-cutlery"></span><span
                                            class="full">点餐</span></a></li>
                                <li class="linked"><a href="trans.php"><span class="fa fa-comment"></span><span
                                                class="full">转账</span></a></li>
                                <li class="linked"><a href="report.php"><span class="fa fa-comment"></span><span
                                            class="full">反馈</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">

                <div class="wdgt">

                    <div class="wdgt-header"><i class="fa fa-exchange"></i>转账</div>
                    <form role="form" action="" method="post">
                        <div class="wdgt-body tbl" style="padding-bottom:10px;">

                            <div class="form-group">
                                <label for="username">转账目标</label>
                                <input type="username" name="username" class="form-control col-sm-12" id="username">
                            </div>
                            <div class="form-group">
                                <label for="money">转账金额</label>
                                <input type="money" name="money" class="form-control col-sm-12" id="money">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" style="margin-top:15px;" value="转账"></input>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!-- END PAGE CONTENT -->

    </div>

</div>

<!-- Default JS (DO NOT TOUCH) -->
<script src="lib/js/jquery.min.js"></script>
<script src="lib/js/jquery-ui.min.js"></script>
<script src="lib/js/bootstrap.min.js"></script>
<script src="lib/js/opacity.widgets.min.js"></script>
<script src="lib/js/hogan.min.js"></script>
<script src="lib/js/typeahead.min.js"></script>
<script src="lib/js/typeahead-example.js"></script>

<!-- Adjustable JS -->
<script src="lib/js/summernote.js"></script>
<script src="lib/js/select2.min.js"></script>
<script src="lib/js/icheck.min.js"></script>
<script src="lib/js/jquery.maskedinput.min.js"></script>
<script>
    $(document).ready(function() {
        $('a[href="form_example.html"]').addClass('active').parent().parent().addClass('in');

        // Initializie WYSIWYG
        $('.summernote').summernote({height:150, toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']]
            ]
        });

        $("#e1").select2();
        $('.icheck-blue').iCheck({ checkboxClass: 'icheckbox_flat-blue', radioClass: 'iradio_flat-blue' });
        $("#date").mask("99/99/9999", {placeholder:" "});
        $("#phone").mask("(999) 999-9999", {placeholder:" "});
        $( ".ui-slider2" ).slider({range: "min",max: 255,value: 67,
            slide: function(event, ui) {$( "#amount" ).html( ui.value + " hrs" );}
        });

    });
</script>

</body>
</html>
