<?php
//echo time();
error_log(__FILE__.print_r($_POST,true));
$data = $_POST['data'];
$user = $_POST['user'];
$dataStr = implode($data);
$dataMd5 = md5($dataStr);
apc_add($dataMd5, $user);
