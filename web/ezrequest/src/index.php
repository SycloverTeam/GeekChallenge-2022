<?php

session_start();



$action = isset($_GET['action']) ? $_GET['action'] : "login";


switch ($action) {
    case 'login':
        ?><!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>抢课了</title>
            <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        </head>
        <body>
            <form action="/?action=index" method="post">
                请输入你的学号：<input type="text" name="xh" />        
                <button id="btn1">点击登录</button>  
            </form>
    
           
        </body>
    </html><?php
    
    break;
    

    case 'index':

        echo '欢迎:'. $_POST['xh']. '同学';
        $class = array(                                             //定义外层数组
           array(0,'足球'),
           array(1,'篮球'),
           array(2,'抖空竹'), 
           array(3,'拓展训练'),
           array(4,'武术'),
           array(5,'花样跳绳'),
           array(6,'器械健身'),
           array(7,'健身健美'),
           array(8,'台球'),
           array(9,'跆拳道'),
           array(10,'健美操'),
           array(11,'高尔夫'),
           array(12,'体育舞蹈'),
           array(13,'啦啦队'),
           array(14,'乒乓球'),
           array(15,'排球'),
           array(16,'网球'),
           array(17,'羽毛球'),
           array(18,'保健班'),
           array(19,'健身气功'),
           array(20,'羽毛球/游泳'),
           array(21,'足球/游泳'),
           array(22,'军事体育'),
           array(23,'舞龙舞狮'),
           array(24,'瑜伽'),
           array(25,'太极'),
           );
        $classes1=array("足球","篮球","抖空竹","拓展训练","武术","花样跳绳","器械健身","健身健美","台球","跆拳道","健美操","高尔夫","体育舞蹈","啦啦队","乒乓球","排球","网球","羽毛球","保健班","健身气功","羽毛球/游泳","足球/游泳","军事体育","舞龙舞狮","瑜伽","太极");
       
       echo '<table border="1" width="600" align="center">';
           echo '<caption><h3>课程列表</h3></caption>';
           echo '<tr bgcolor="#dddddd">';
           echo '<th>课程号</th><th>课程名</th>';
           echo '</tr>';
           //使用双层for语句嵌套二维数组$class,以HTML表格的形式输出
           //使用外层循环遍历数组$class中的行
           for($row=0;$row<count($class);$row++)
           {
               echo '<tr>';
               //使用内层循环遍历数组$class 中 子数组的每个元素,使用count()函数控制循环次数
               for($col=0;$col<count($class[$row]);$col++)
               {
                   echo '<td>'.$class[$row][$col].'</td>';
               }
               echo '</tr>';
           }
           echo '</table>';
       
       
       $random =rand(0,25);
       //echo $random;
       $argv = array_slice($class,$random,1);
       date_default_timezone_set('UTC');
       $_start = date('s');

       
       
       
       $_SESSION['class']=$random;
       $_SESSION['time'] = $_start;
       
       echo "依梦学姐觉得这个课更好摸鱼:". $_SESSION['class']. '号'. $classes1[$random];
       
       ?><!DOCTYPE html>
       <html>
           <head>
               <meta charset="UTF-8">
               <title>抢课了</title>
               <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
           </head>
           <body>
               <form action="/?action=check" method="post">
                   课程号：<input type="text" name="num" />        
                   课程名：<input type="text" name="class" />
                   <button id="btn2">点击抢课</button>  
               </form>
       
              
           </body>
       </html><?php
        break;


    case 'check':
        date_default_timezone_set('UTC');
        $_end = date('s');
        $classes2=array("足球","篮球","抖空竹","拓展训练","武术","花样跳绳","器械健身","健身健美","台球","跆拳道","健美操","高尔夫","体育舞蹈","啦啦队","乒乓球","排球","网球","羽毛球","保健班","健身气功","羽毛球/游泳","足球/游泳","军事体育","舞龙舞狮","瑜伽","太极");
    session_start();
    if(!isset($_SESSION['postCounter']))
    {
        $_SESSION['postCounter'] = 0;
    }

    if(count($_POST) > 0)
    {
        $_SESSION['postCounter']++;
    }
    //echo $_POST["num"];
    //echo $_SESSION['class'];
    //echo $_SESSION['time'];
    //echo $_end;
    //echo $classes[$_SESSION['class']];

	if($_SESSION['postCounter'] > 1)
	{
   	 header('Location: /?action=login');
   	 setrawcookie('flag','hacker!!');
   	 $_SESSION['postCounter'] = 0;
     $_SESSION['class']=$random;
    
	}
    
    if ($_POST['class'] == NULL)
    {
        echo "不可以不写课程名哦";
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if ($_POST["num"] == $_SESSION['class'] && $_POST["class"] == $classes2[$_SESSION['class']]) 
        {
            if ($_end - $_SESSION['time'] >= 0 && $_end - $_SESSION['time'] < 1){
            setrawcookie('flag','SYC{just_@_ez_requ3st}');
            echo '抢到了!依梦学姐很满意并送了你一块小饼干';
			
            //setcookie('flag','SYC{just_@_ez_requ3st}',time()+1*60,'/');
            //echo 'SYC{just_@_ez_requ3st}';
            } else {
            echo '手慢了，这个课已经被抢完了，再试一次吧';
            }
        } else {
            echo '依梦学姐要的不是这个课!';
        }
    } else {
        echo '用POST方法提交哦';
    }



    break;   
}
?>