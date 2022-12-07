<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>


<body>
<form action="login.php" method="POST">
    <div class="box">
        <h2>Login</h2>
        <div class="input-box">
            <label>账号</label>
            <input type="text" name='username'/>
        </div>
        <div class="input-box">
            <label>密码</label>
            <input type="password" name='secretpass' />
        </div>
            <div>
		<input type='submit' name='login' value='登录' style="background: #df9f71;height: 50px;width: 260px;"/>
            </div>
    </div>

    </form>
</body>

</html>