<?php
error_reporting(0);
session_start();
echo "<!-- 其实这个反馈界面还在调试阶段捏，我前几天上班摸鱼了…… -->";
include 'random.php';

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');history.back()</script>");
}

if(!isset($_SESSION['username'])){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}

$re = '@(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))@';

if(isset($_POST['topic']) and isset($_POST['report']) and isset($_POST['code'])){
    if($_POST['code'] === $code) {
        $str = $_POST['report'];
        preg_match_all($re, $str, $urls);
        @file_put_contents("/qu35t10ns/".base64_encode($urls[0][0]), "");
        echo "<script>alert('提交成功！');</script>";
    } else {
        show_err("Error!", "验证码不正确");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>WeeLin的早茶铺子 - 反馈</title>

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
                        <li class="active">反馈</li>
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
                    <div class="wdgt-header"><i class="icon icon-send"></i>反馈</div>
                    <div class="wdgt-body tbl" style="padding-bottom:10px;">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label for="text">主题</label>
                                <input type="text" name="topic" class="form-control col-sm-12" id="text">
                            </div>
                            <div class="form-group">
                                <label for="text">验证码<small>$code</small></label>
                                <input type="text" name="code" class="form-control col-sm-12" id="text" placeholder="hint: f12">
                            </div>
                            <div class="form-group">
                                <label>反馈内容</label>
                                <textarea class="form-control" name="report" rows="4" style="resize: none"></textarea>
                                <input type="submit" class="btn btn-primary" style="margin-top:15px;" value="提交"></input>
                            </div>
                        </form>
                    </div>
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
