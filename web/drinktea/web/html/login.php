<?php
error_reporting(0);
session_start();
$path = '/U5ers1nf0_95279527/';

function show_err($title, $content) {
    die("<script>alert('{$title}\\n{$content}');history.back()</script>");
}

if(isset($_GET['preusername'])) {
    $preusername = $_GET['preusername'];
} else {
    $preusername = '';
}

if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = strval($_POST['username']);
    $password = strval($_POST['password']);

    if($username == '' or $password == '') {
        show_err("Error!", "用户名或密码不能为空");
    }

    $str = $username.$password;
    if(preg_match('/[^A-Za-z0-9]/i', $str)) {
        show_err("Error!", "别给我耍花招捏，只能用字母和数字");
    }

    if(!in_array($username, scandir($path))) {
        show_err("Error!", "用户 [{$username}] 不存在");
    }

    $info = explode('|', file_get_contents($path.$username));

    if($info[0] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['money'] = intval($info[1]);
        $_SESSION['vip'] = intval($info[2]);
        die("<script>alert('登录成功！');location.href='index.php'</script>");
    } else {
        show_err('Error!', '用户名或密码错误！');
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>WeeLin的早茶铺子 - 登录</title>

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
                    <h1>登录</h1><br>

                    <div class="form-group">
                        <label for="user">用户名</label>
                        <input type="user" name="username" class="form-control col-sm-12" id="user" value="<?=$preusername?>">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" name="password" class="form-control col-sm-12" id="password">
                    </div>

                </div>

                <!-- LOGIN BUTTONS -->
                <div class="log-footer">
                    <a href="register.php" class="btn btn-default">前往注册</a>&nbsp;&nbsp;
                    <input type="submit" class="btn btn-info" value="登录"></input>
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