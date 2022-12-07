<?php
error_reporting(0);
session_start();

$path = '/U5ers1nf0_95279527/';

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');history.back()</script>");
}

if(!isset($_SESSION['username'])){
    die("<script>alert('请先登录！');location.href='login.php'</script>");
}

echo '<!-- 管理：mng.php -->';

$info = explode('|', file_get_contents($path.$_SESSION['username']));
$_SESSION['money'] = $info[1];
$_SESSION['vip'] = $info[2];

$status = '';
if($_SESSION['vip'] == 1) {
    $status = 'VIP贵宾';
} else {
    $status = '普通顾客';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>WeeLin的早茶铺子 - 主页</title>

    <!-- Default Styles (DO NOT TOUCH) -->
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/fonts.css">
    <link rel="stylesheet" href="lib/css/opacity-admin.css"/>

    <!-- Adjustable Styles -->
    <link rel="stylesheet" href="lib/css/perfect-scrollbar.min.css">

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
                        <li class="active">主页</li>
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


            <!-- BEGIN INVOICE -->

            <div class="alert-holder">
                <div class="alert alert-success">
                    &nbsp&nbsp<span class="icon icon-ok-sign"></span>
                    <font size="4">这是我们新上线的点单系统，点击<a href="order.php">这里</a>可以下单,祝您用餐愉快！</font>
                </div>
            </div>

            <div class="col-md-12">
                <div id="left_1" class="wdgt wdgt-warning">
                    <div class="wdgt-body wdgt-stats tbl">
                        <div class="col-sm-1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-user"></i></div>
                        <div class="col-sm-11">
                            <div class="stats-val" align="right">欢迎，<?=$_SESSION['username']?></div>
                            <div class="stats-title" align="right"><font size="4"><?=$status?></font></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div id="right_1" class="wdgt wdgt-success">
                    <div class="wdgt-body wdgt-stats tbl">
                        <div class="col-sm-1">&nbsp&nbsp&nbsp&nbsp<i class="icon icon-credit-card"></i></div>
                        <div class="col-sm-11">
                            <div class="stats-val" align="right">￥<?=$_SESSION['money']?></div>
                            <div class="stats-title" align="right"><font size="4">余额</font></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div id="left" class="wdgt wdgt-primary">
                    <div class="wdgt-header"><i class="fa fa-info"></i>热知识</div>
                    <div class="wdgt-body tbl" style="padding-bottom:5px;">
                        <div class="col-md-12">
                            <h2><b>广东早茶</b></h2>
                            <font size="4">&emsp;&emsp;广东早茶是一种广东民间饮食风俗。早茶是汉族社交饮食习俗，多见于中国南方地区，如广东、江苏、浙江等地，尤其是在广东。广东人饮早茶，有的是当作早餐的，一般都是全家老小围坐一桌，共享天伦之乐。广东人品茶大都一日早、中、晚三次，但早茶最为讲究，饮早茶的风气也最盛，由于饮早茶是喝茶佐点，因此当地称饮早茶为吃早茶。</font>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4" align="center">
                <div id="right" class="wdgt wdgt-primary wdgt-body"
                     style="display: flex;align-items: center;justify-content: center">
                    <img src="lib/img/drinktea.gif" style="width: auto;height: 100%;max-width: 100%">
                </div>
            </div>


            <div class="tbl">

                <!-- DASHBOARD TABLE EXAMPLE -->
                <div class="col-md-12">
                    <div class="wdgt wdgt-primary" hide-btn="false">
                        <div class="wdgt-header"><i class="fa fa-group"></i>负责人公示处</div>
                        <div class="wdgt-body wdgt-table">

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><font size="4">头像</font></th>
                                    <th><font size="4">用户名</font></th>
                                    <th><font size="4">身份</font></th>
                                    <th><font size="4">责任</font></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="lib/img/avt2.jpg" class="img-circle" alt="" style="width: 50px"></td>
                                    <td><font size="4" style="line-height: 40px">Wee_Lin</font></td>
                                    <td><font size="4" style="line-height: 40px">店长</font></td>
                                    <td><font size="4" style="line-height: 40px">管理门店</font></td>
                                </tr>
                                <tr>
                                    <td><img src="lib/img/avt1.png" class="img-circle" alt="" style="width: 50px"></td>
                                    <td><font size="4" style="line-height: 40px">f4tb3e</font></td>
                                    <td><font size="4" style="line-height: 40px">网管</font></td>
                                    <td><font size="4" style="line-height: 40px">修电脑</font></td>
                                </tr>
                                <tr>
                                    <td><img src="lib/img/avt4.png" class="img-circle" alt="" style="width: 50px"></td>
                                    <td><font size="4" style="line-height: 40px">太极大师</font></td>
                                    <td><font size="4" style="line-height: 40px">每天穿着背心和人字拖在楼下溜达的大叔</font></td>
                                    <td><font size="4" style="line-height: 40px">收取本店的租金</font></td>
                                </tr>
                                <tr>
                                    <td><img src="lib/img/avt3.jpg" class="img-circle" alt="" style="width: 50px"></td>
                                    <td><font size="4" style="line-height: 40px">狮吼功继承人</font></td>
                                    <td><font size="4" style="line-height: 40px">腰间别着一串钥匙的神秘中年妇女</font></td>
                                    <td><font size="4" style="line-height: 40px">没收太极大师所收的租金</font></td>
                                </tr>
                                <tr>
                                    <td><img src="lib/img/avt5.png" class="img-circle" alt="" style="width: 50px"></td>
                                    <td><font size="4" style="line-height: 40px">假冒斧头帮</font></td>
                                    <td><font size="4" style="line-height: 40px">保安</font></td>
                                    <td><font size="4" style="line-height: 40px">场所码、测温枪</font></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- DASHBOARD TABS EXAMPLE -->

            </div>

            <div class="tbl">

                <!-- DASHBOARD CHATBOX EXAMPLE -->
                <div class="col-md-12">
                    <div id="tabs" class="wdgt wdgt-info" hide-btn="true">
                        <div class="wdgt-header"><i class="fa fa-comment-o"></i>留言板</div>
                        <div class="wdgt-body wdgt-messages" style="min-height: 400px;">
                            <div class="wdgt-chat">
                                <div class="avatar"><img src="lib/img/avatars/1.png" width="65" height="65"></div>
                                <div class="msg">
                                    <div class="msg-window msg-left">
                                        <h4>酱爆</h4>
                                        为什么我今天来没有米饭吃呢？
                                    </div>
                                </div>
                            </div>
                            <div class="wdgt-chat">
                                <div class="msg">
                                    <div class="msg-window msg-right" align="right">
                                        <h4>狮吼功继承人</h4>
                                        不光今天没你饭吃，从明天开始，逢一、三、五停饭，二、四、六间歇性供饭，怎样？斜眉歪眼，一个个鬼哭狼嚎什么？找死啊？我看你们都活腻了！
                                    </div>
                                </div>
                                <div class="avatar"><img src="lib/img/avt3.jpg" width="65" height="75"></div>
                            </div>
                            <div class="wdgt-chat">
                                <div class="msg">
                                    <div class="msg-window msg-right" align="right">
                                        <h4>Wee_Lin</h4>
                                        不好意思哈，包租婆脾气有点爆，关于店铺的问题可以点<a href="report.php">这里</a>进行反馈
                                    </div>
                                </div>
                                <div class="avatar"><img src="lib/img/avt2.jpg" width="65" height="75"></div>
                            </div>
                            <div class="wdgt-chat">
                                <div class="avatar"><img src="lib/img/avt1.png" width="65" height="75"></div>
                                <div class="msg">
                                    <div class="msg-window msg-left">
                                        <h4>f4tb3e</h4>
                                        我煞费苦心做的反馈页面你们要好好用啊，顾客发的建议你一定要认真看 @狮吼功继承人
                                    </div>
                                </div>
                            </div>
                            <div class="wdgt-chat">
                                <div class="msg">
                                    <div class="msg-window msg-right" align="right">
                                        <h4>狮吼功继承人</h4>
                                        好好好
                                    </div>
                                </div>
                                <div class="avatar"><img src="lib/img/avt3.jpg" width="65" height="75"></div>
                            </div>
                        </div>
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
<script src="lib/js/perfect-scrollbar.min.js"></script>
<script src="lib/js/opacity.switches.js"></script>
<script src="lib/js/flot/jquery.flot.min.js"></script>
<script src="lib/js/flot/jquery.flot.pie.min.js"></script>
<script src="lib/js/flot/jquery.flot.selection.min.js"></script>
<script>

    $(window).resize(function () {
        var rightheight = document.getElementById('right');
        var leftheight = document.getElementById('left');
        rightheight.style.height = leftheight.offsetHeight + 'px';
    })

    var rightheight = document.getElementById('right');
    var leftheight = document.getElementById('left');
    rightheight.style.height = leftheight.offsetHeight + 'px';


    $(document).ready(function () {
        $('.switch4').change(function () {
            if ($(this).val() == 0) {
                $('.contain').addClass('round');
            } else {
                $('.contain').removeClass('round');
            }
        });

        $('.switch5').change(function () {
            var temp = $(".left").html();
            if ($(this).val() == 0) {
                $(".left").remove();
                $('.right').after('<div class="left hidden-xs">' + temp + '</div>');
            } else {
                $(".left").remove();
                $('.right').before('<div class="left hidden-xs">' + temp + '</div>');
            }
        });
    });

    $(document).ready(function () {
        $('a[href="index.html"]').addClass('active').parent().parent().addClass('in');
        flotSelectionChart();
        flotPieChart();
        $("#tabs").tabs();
        $('.wdgt-tab, .wdgt-messages').perfectScrollbar({suppressScrollX: true});
        $('.wdgt-messages').scrollTop(400);
    });

    $(window).resize(function () {
        flotSelectionChart();
        flotPieChart();
    });

    function flotSelectionChart() {
        var data = [{
            label: "Website Hits",
            lines: {show: true, fill: true, fillColor: 'rgba(145, 199, 150, 0.45)'},
            points: {show: true},
            data: [[-0.5, 834], [0.5, 923], [2.5, 1245], [4.5, 1090], [6.5, 999], [8.5, 1056], [10.5, 1097], [12.5, 1354], [13.5, 999]]
        }, {
            label: "Unique Visitors", lines: {show: true, fill: true}, points: {show: true}, yaxis: 2,
            data: [[-0.5, 7865], [0.5, 8976], [2.5, 19134], [4.5, 8452], [6.5, 8321], [8.5, 7987], [10.5, 8098], [12.5, 16237], [13.5, 7999]]
        }, {
            label: "Bots", lines: {show: true, fill: false}, points: {show: true}, yaxis: 3,
            data: [[-0.5, 2144], [0.5, 3456], [2.5, 6777], [4.5, 2333], [6.5, 2111], [8.5, 1889], [10.5, 1999], [12.5, 5555], [13.5, 2000]]
        }];

        var options = {
            series: {},
            colors: ['#8BC198', '#7897C8', '#DAC582'],
            legend: {noColumns: 1, backgroundOpacity: 0.5, backgroundColor: '#FFF'},
            xaxis: {
                min: 0,
                max: 13,
                ticks: [
                    [0.5, "Sunday"],
                    [2.5, "Monday"],
                    [4.5, "Tuesday"],
                    [6.5, "Wednesday"],
                    [8.5, "Thursday"],
                    [10.5, "Today"],
                    [12.5, "Saturday"]
                ]
            },
            yaxes: [
                {min: 0, max: 2000},
                {show: false, min: 0, max: 40000},
                {show: false, min: 0, max: 20000}
            ],
            selection: {mode: "x"}
        };

        var placeholder = $("#placeholder");

        var plot = $.plot(placeholder, data, options);

        plot.setSelection({
            xaxis: {
                from: 9.5,
                to: 11.5
            }
        });

    }

    function labelFormatter(label, series) {
        return "<div style='font-size:8pt; text-align:center; padding:2px; color:rgba(255,255,255,0.8);'>" + Math.round(series.percent) + "% - " + label + " </div>";
    }

    function flotPieChart() {

        var data = [];

        for (var i = 0; i < 4; i++) {
            if (i == 0) {
                data[i] = {label: "Firefox", data: 28}
            }
            if (i == 1) {
                data[i] = {label: "Chrome", data: 46}
            }
            if (i == 2) {
                data[i] = {label: "Safari", data: 18}
            }
            if (i == 3) {
                data[i] = {label: "IE", data: 8}
            }
        }

        $.plot('#pieholder', data, {
            colors: ['#8BC198', '#7897C8', '#DAC582', '#7CACCE'],
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 3 / 4,
                        formatter: labelFormatter,
                        background: {opacity: 0.5, color: '#000000'}
                    }
                }
            },
            legend: {show: false}
        });
    }

</script>

</body>
</html>