<?php
error_reporting(0);
$path = '/U5ers1nf0_95279527/';
$begin_money = 20;
$begin_vip = 0;

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');history.back()</script>");
}

if(isset($_POST['username']) and isset($_POST['password'])) {

    $username = strval($_POST['username']);
    $password = strval($_POST['password']);

    if($username == '' or $password == '') {
        show_err("Error!", "用户名或密码不能为空");
    }

    $str = $username.$password;
    if(preg_match('/[^A-Za-z0-9]/i', $str)) {
        show_err("Error!", "别给我耍花招捏，只能用字母和数字");
    }

    if(in_array($username, scandir($path))) {
        show_err("Error!", "用户名 [{$username}] 已被注册");
    }

    @file_put_contents($path.$username, join("|", [$password, strval($begin_money), strval($begin_vip)]));
    die("<script>alert('Success!\\n用户名：{$username}\\n密码：{$password}');location.href='login.php?preusername={$username}'</script>");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>WeeLin的早茶铺子 - 注册</title>

    <!-- Default Styles (DO NOT TOUCH) -->
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/fonts.css">
    <link rel="stylesheet" href="lib/css/opacity-admin.css"/>

    <!-- Adjustable Styles -->
    <link rel="stylesheet" href="lib/css/icheck.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="lib/js/html5shiv.js"></script>
    <script src="lib/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="contain">

    <!-- BEGIN LOGIN -->
    <div class="login">
        <div class="login-box">

            <!-- LOGIN FORM -->
            <form role="form" action="" method="post">
                <div class="log-contain">
                    <h1>注册</h1><br>

                    <div class="form-group">
                        <label for="user">用户名</label>
                        <input type="user" name="username" class="form-control col-sm-12" id="user">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" name="password" class="form-control col-sm-12" id="password">
                    </div>

                </div>

                <!-- LOGIN BUTTONS -->
                <div class="log-footer">
                    <a href="login.php" class="btn btn-default">返回登录</a>&nbsp;&nbsp;
                    <input type="submit" class="btn btn-info" value="注册"></input>
                </div>
            </form>

        </div>

    </div>

</div>

<!-- Default JS (DO NOT TOUCH) -->
<script src="lib/js/jquery.min.js"></script>
<script src="lib/js/bootstrap.min.js"></script>

<!-- Adjustable JS -->
<script src="lib/js/icheck.min.js"></script>
<script>
    $('.icheck-blue').iCheck({ checkboxClass: 'icheckbox_flat-blue', radioClass: 'iradio_flat-blue' });
</script>

</body>
</html>