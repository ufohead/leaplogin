<?php
//echo time();
error_log(__FILE__.print_r($_POST,true));
$data = $_POST['data'];
$dataStr = implode($data);
$dataMd5 = md5($dataStr);
$result = apc_fetch($dataMd5);

if(!$result) {
	//handle error
    echo "Invalid User";
} else {
    echo $result;
}
