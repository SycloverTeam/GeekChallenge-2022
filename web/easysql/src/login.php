<?php
error_reporting(0);
session_start();

// database
$db_host = "127.0.0.1";
$db_user = $db_pass = "root";
$db_name = "vanzy_db";
@$con = mysqli_connect($db_host, $db_user, $db_pass);

//  Check connection
if (!$con)
{
    echo "Failed to connect to MySQL: " . mysqli_error($connection);
}

@mysqli_select_db($con, $db_name) or die('Could select database: ' . mysqli_error($connection));


function alertMes($mes,$url){
    die("<script>alert('{$mes}');location.href='{$url}';</script>");
}

//waf 
function checkSql($s) {
    if(preg_match("/regexp|between|in|flag|=|>|<|and|\||right|left|insert|database|reverse|update|extractvalue|floor|join|substr|&|;|\\\$|char|\x0a|\x09|column|\ /i",$s)){
        alertMes('NO,no,nO,No!','index.php');
    }
}

// login
if (isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['secretpass']) && $_POST['secretpass'] != '') {
    $username=$_POST['username'];
    $secretpass=$_POST['secretpass'];
    if ($username !== 'vanzy') {
        alertMes('you are not vanzy!', 'index.php');
    }
    checkSql($secretpass);
    $sql="SELECT secretpass FROM vanzy_secret WHERE username='vanzy' and secretpass='$secretpass';";
    $user_result=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($user_result);
    


    if ($row) {
       // alertMes('nothing found','index.php');
       echo '别测了 码都测黄了！😅';
    }else{

       // alertMes('nothing found','index.php');
       echo '别测了 码都测黄了！😅';
    }
        
   
     if($secretpass == 'van2y0secret0qaq'){
                die("SYC{we1c0me_t0_van2y_'s_secr3t!}");
        }else{
                echo"密码不对你不会不知道吧？ 到底行不行啊 细狗？";
        }
    
   
   /* if (!$row) {
        alertMes('nothing found','index.php');
    }else{
        if ($row['secretpass'] === $password) {
            if($password == 'van2y0secret0qaq'){
                die("SYC{we1c0me_t0_van2y_'s_secr3t!}");
            }else{
                alertMes('nothing found','index.php');
            }
        }
    }*/
}     

?>