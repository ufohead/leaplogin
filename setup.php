<?php
//echo time();
error_log(__FILE__.print_r($_POST,true));

$user = $_POST['user'];
$existUser = apc_fetch($user);

// check existed user
if($existUser !== false) {
	$oldDataMd5 = $existUser;
	apc_delete($user);
	apc_delete($oldDataMd5);
}

$data = $_POST['data'];
$dataStr = implode($data);
$dataMd5 = md5($dataStr);

$existData = apc_fetch($dataMd5);
if ($existData !== false) {
	echo 'Setup fail, duplicated setting with others';
} else {
	apc_add($dataMd5, $user);
	apc_add($user, $dataMd5);
	echo 'Setup OK, user: '.$user;	
}