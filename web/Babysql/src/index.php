<?php
error_reporting(0);

session_start();
/**
 * Database mysql
 */
$db_host = "127.0.0.1";
$db_user = $db_pass = "root";
$db_name = "ctfchinfo";
$conn = mysql_connect($db_host, $db_user, $db_pass) or die('Could not connect: ' . mysql_error());

mysql_select_db($db_name, $conn) or die('Could select database: ' . mysql_error());

register_shutdown_function(function () {
	global $conn;
	mysql_close($conn);
});

function query($sql) {
	$result = mysql_query($sql);
	$rows = mysql_fetch_assoc($result);
	return $rows;
}
/**
 * Main
 */

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

$action = isset($_GET['action']) ? $_GET['action'] : "index";
if (!in_array($action, ['login', 'reg']) && !isset($_SESSION['username'])) {
	header('Location: /?action=login');
	exit;
}



switch ($action) {
case 'login':
	if (isset($_POST['username'])) {
		$username = addslashes($_POST['username']);
		$password = md5($_POST['password']);
		$res = query("select * from users where username='{$username}' and password='{$password}';");
		if ($res) {
			$_SESSION['username'] = $res['username'];
			header('Location: /?action=index');
			exit;
		}
	}
	?><div class="box">
			<h2>Login</h2>
			<div class="input-box">
				<form action="/?action=login" method="POST">
					<label>Username</label>
					<br>
					<input type="text" name="username">
					<br>
					<label>Password</label>
					<br>
					<input type="password" name="password">
					<br>
					<div class = "btn-box">
						<a href="/?action=reg">Regist</a>
						<input type="submit" value="Login">
					</div>
				</form>
			</div>
		</div>
	<?php

	break;
case 'reg':
	if (isset($_POST['username']) && $_POST['username'] != "") {
		$username = addslashes($_POST['username']);
		$password = md5($_POST['password']);
		if (mysql_query("insert into users(username,password,info) values ('{$username}','{$password}','');")) {
			header('Location: /?action=login');
		} else {
			header('Location: /?action=reg&msg=Registration failed');
		}
		exit;
	} else {
		?><div class="box">
		<h2>Regist</h2>
		<div class="input-box">
			<div><?=addslashes($_GET['msg']);?></div>
			
			<form action="/?action=reg" method="POST">
				<label>Username</label>
				<br>
				<input type="text" name="username">
				<br>
				<label>Password</label>
				<br>
				<input type="password" name="password">
				<br>
				<div class = "btn-box">
					<a href="/?action=login">Go to Login</a>
					<input type="submit" value="Regist">
				</div>
			</form>
		</div>
	</div>
<?php
}
	break;
case 'change':
	if (isset($_POST['info'])) {
		$info = addslashes($_POST['info']);
		if (mysql_query("update users set info='{$info}' where username='{$_SESSION['username']}';")) {
			header('Location: /?action=index');
		} else {
			header('Location: /?action=change&msg=Change failed');
		}
		exit;
	}
	break;
case 'logout':
	session_destroy();
	header('Location: /?action=login');
	exit;
	break;
case 'index':
default:
	$info = query("select info from users where username='{$_SESSION['username']}';");
	?><div class="box">
		<h2>Login successful</h2>
		<div><?=addslashes($info['info']);?></div>
		<hr>
		<div><?=addslashes($_GET['msg']);?></div>
		<br>
		<div class = "input-box">
				<form action="/?action=change" method="POST">
						<br>
					<lable>Find some info here <lable>
						<br>
					<input type="text" name="info">
						<br>
					<div class = "btn-box">
						<input type="submit" value="Submit">
					</div>
				</form>
		</div>
			<div class = "btn-box">
				<a href="/?action=logout">Logout</a>
			</div>
  	</div>
<?php
break;
}
echo "<SYC{this is not a flag}>";