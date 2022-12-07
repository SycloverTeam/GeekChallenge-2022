<?php
error_reporting(0);
$code = $_GET['cmd'];
if('syclover' === preg_replace('/;+/','syclover',preg_replace('/[A-Za-z_\(\)]+/','',$code))){
    eval($code.'syclover!');
} else {
    echo 'nonono';
}
echo file_get_contents(__FILE__);
?>