<?php
error_reporting(0);
session_start();

if(!isset($_SESSION['username'])){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>WeeLin的早茶铺子 - 404</title>

    <!-- Default Styles (DO NOT TOUCH) -->
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/fonts.css">
    <link rel="stylesheet" href="lib/css/opacity-admin.css"/>

    <!-- Adjustable Styles -->

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
                        <li class="active">404</li>
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

            <div class="col-md-3"></div>

            <div class="col-md-6 align-center">
                <br><br><br>
                <h1 class="fof">404</h1>
                <br><br>
                <div class="fod">啊咧咧？ 页面找不到了捏</div>

            </div>

            <div class="col-md-3"></div>

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
<script>
    $(document).ready(function () {
        $('a[href="404.html"]').addClass('active').parent().parent().addClass('in');
    });
</script>

</body>
</html>