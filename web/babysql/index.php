<!DOCTYPE html>
<head>
    <title>babysql</title>
    <canvas id="canvas" style="background:black" width="620" height="340"></canvas>
    <script type="text/javascript">
        window.onload = function(){
            //获取canvas图形对象
            var canvas = document.getElementById("canvas");
            //获取图形的上下文
            var context = canvas.getContext("2d");
            //获取浏览器屏幕的宽度和高度
            var W = window.innerWidth;
            var H = window.innerHeight;
            //设置canvas的宽度和高度
            canvas.width = W;
            canvas.height = H;
            //每个文字的字体大小
            var fontSize = 15;
            //计算列
            var colunms = Math.floor(W /fontSize);
            //记录每列文字的y轴坐标
            var drops = [];
            //给每一个文字初始化一个起始点的位置
            for(var i=0;i<colunms;i++){
                drops.push(0);
            }
            //  运动的文字这里可以自定义的
            // var str ="01abcdefghijklmnopqurstuvwxyzABCDEFGHIGHL7578778";
            var str ="SYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYCSYC";
            // 4:fillText(str,x,y);原理就是去更改y的坐标位置
            //绘画的函数
            function draw(){
                //让背景逐渐由透明到不透明
                context.fillStyle = "rgba(0,0,0,0.05)";
                context.fillRect(0,0,W,H);
                //给字体设置样式
                //context.font = "700 "+fontSize+"px  微软雅黑";
                context.font = fontSize + 'px arial';
                //给字体添加颜色
                context.fillStyle ="green";//随意更改字体颜色
                //写入图形中
                for(var i=0;i<colunms;i++){
                    var index = Math.floor(Math.random() * str.length);
                    var x = i*fontSize;
                    var y = drops[i] *fontSize;
                    context.fillText(str[index],x,y);
                    //如果要改变时间，肯定就是改变每次他的起点
                    if(y >= canvas.height && Math.random() > 0.92){
                        drops[i] = 0;
                    }
                    drops[i]++;
                }
            };
            function randColor(){7
                var r = Math.floor(Math.random() * 256);
                var g = Math.floor(Math.random() * 256);
                var b = Math.floor(Math.random() * 256);
                return "rgb("+r+","+g+","+b+")";
            }
            draw();
            //下面50表示速度的快慢，数字越小速度越快，数字越大速度越慢
            setInterval(draw,50);
        };
    </script>
    <style type="text/css">
        body{margin: 0; padding: 0; overflow: hidden;}
        p{
            width: 40%;
            height: 50%;
            overflow: auto;
            margin: auto;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            color: #759173;
            font-size: 150%;
        }
        h6{
            width: 40%;
            height: 10%;
        //            overflow: auto;
            margin: auto;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            color: #759173;
            font-size: 150%;
        }

        input{
            position: absolute;
            top: 37%; left: 44%; bottom: 1; right: 1;
        }
    </style>
</head>
<body>
<p>这是一个神奇的按钮，你可以读到所有人的账号密码<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请输入你要查询的GuestId：</p>
<form action="index.php" method="post" name="updata">
    <input type="text" name="g"><br>
</form>

</body>
</html>


<?php
$gid = $_POST['g'];

header("Content-type: text/html; charset=utf-8");
$host        = "host=127.0.0.1";
$port        = "port=5432";
$dbname      = "dbname=ctf";
$credentials = "user=postgres password=phppostgres";
error_reporting(0);

$db = pg_connect( "$host $port $dbname $credentials"  );
if(!$db){
    echo "Error : Unable to open database\n";
}

if(preg_match_all("[;|\'|\"]",$gid)){
    echo "<h6>小黑客~露出鸡脚了吧</h6>";
    die();
}
if(preg_match_all("offset|pg_file_write",$gid)){
    echo "<h6>小黑客~露出鸡脚了吧</h6>";
    die();
}


$sql = "select * from users.user where id = $gid limit 1;";
$result =  pg_query($db,$sql);
$j = 0;
if ($result){
    echo "<h6>";
    while(list($id,$username,$passwd)= pg_fetch_row($result)){
        echo "用户名：" . $username . "<br/>";
        echo "用户密码：" . $passwd . "<br/>";
        $j ++;
        if($j == 5){
            break;
        }

    }
    echo "</h6>";
}


