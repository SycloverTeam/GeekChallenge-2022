<?php 
session_start();
$uname = $_POST['username'];
$passwd = md5($_POST['password']);

class Log{
    public $password;
    public $username;
    public $islogin;

    public function __construct($uname,$passwd){
        $this->password = $passwd;
        $this->username = $uname;
        $this->islogin = 0;
    }
}

$loginfor = new Log($uname , $passwd);
$info = serialize($loginfor);
if($_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
    $newinfo = str_replace("admin" , "hacker" , $info);
}
if($loginfor -> password === 'c930590c1a152f47fb01cad07f69a636' && $loginfor -> username === 'admin'){
    $newinfo = str_replace("0" , "1" , $info);
}
$_SESSION['loginfo'] = base64_encode($newinfo);
header('location:login.php');