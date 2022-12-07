<?php
//真的随机吗？
$seed = file_get_contents("/seed");

mt_srand($seed);
mt_rand();//   == 1567320364
mt_rand();
mt_rand();
mt_rand();
mt_rand();
mt_rand();
$code = md5(mt_rand());
echo file_get_contents("random.php");
?>
