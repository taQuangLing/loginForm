<?php
function getPwdSecurity($pwd) {
	return md5(md5($pwd).MD5_PRIVATE_KEY);
}
function validationToken(){
	$token = '';
	if (isset($_COOKIE['token'])){
		$token = $_COOKIE['token'];
		$sql = "select * from user where token = '$token';";
		$data = executeResult($sql);
		if ($data == NULL || count($data) == 0){
			return NULL;
		}
		else{
			return $data[0];
		}
	}
}

function getGET($key) {
	$value = '';
	if (isset($_GET[$key])) {
		$value = $_GET[$key];
	}
	$value = fixSqlInjection($value);
	return $value;
}

function getPOST($key) {
	$value = '';
	if (isset($_POST[$key])) {
		$value = $_POST[$key];
	}
	$value = fixSqlInjection($value);
	return $value;
}

function fixSqlInjection($str) {
	$str = str_replace("\\", "\\\\", $str);
	$str = str_replace("'", "\'", $str);
	return $str;
}