<?php
if(file_exists($_COOKIE['path'].'/'.md5('example').".jpg")){
    include('photo.php');
}else {
    echo "<h2 align='center'><a href='/catchImg.php?file_url=example.jpg'>获取实例图片</a></h2>";
}