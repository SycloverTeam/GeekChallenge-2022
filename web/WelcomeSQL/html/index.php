<?php
error_reporting(0);
session_start();

// database
$db_host = "127.0.0.1";
$db_user = "ctfer";
$db_pass = "geek_2022";
$db_name = "WelcomeSQL";
@$con = mysqli_connect($db_host, $db_user, $db_pass);

//  Check connection
if (!$con)
{
    echo "Failed to connect to MySQL: " . mysqli_error($connection);
}

@mysqli_select_db($con, $db_name) or die('Could select database: ' . mysqli_error($connection));

// login
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $sql = "SELECT id,username FROM user_info WHERE id=$id;";
    $user_result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($user_result);

    if($row)
    {
    echo "<font size='5' color= '#000000'>";
    echo "id:  " . $row['id'];
    echo "<br>";
    echo "username:  " . $row['username'];
    echo "</font>";
    }
    else 
    {
    echo '<font color= "#000000">';
    echo "没东西给你看，要不你v我50转你flag吧";
    echo '<br><img src="img/v50.jpg" width="300">';
    echo "</font>";  
    }
}     

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<!-- By the way, can you GET me your id? -->
<body>
        <div class="box" width="500">
            <font color="#ffffff"><h1>Guess guess where you can inject me.</h1></font>
        </div>
</body>

</html>