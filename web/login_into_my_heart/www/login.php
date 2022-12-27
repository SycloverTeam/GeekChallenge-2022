<?php
session_start();
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

$loginfo = unserialize(base64_decode($_SESSION['loginfo']));
if ($loginfo -> islogin == 1){
    echo "时隔30个小时，你终于发了信息给我，你说“宝贝，我想你了。”，我很开心，我终于以为我的舔狗日子到了，可没想到信息发出来两秒都没有，你就撤回了，你说发错了，当我说准备要回没关系的时候，我看见了红色的感叹号。";
    echo "<br>";
    $flag = file_get_contents("/flag");
    echo "旅行者，这是她唯一给我的东西，既然断绝联系了，那我就没必要留着了，送给你吧，反正我也看不懂是什么意思";
    echo "<br>";
    echo $flag;
}
else{
    //var_dump($loginfo);
    //echo base64_decode($_SESSION['loginfo']);
    header('location:err.php');
}