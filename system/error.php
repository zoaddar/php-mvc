<?php

function error($msg="", $type=404) {
	if(function_exists("error{$type}")) {
		$func = "error{$type}";
		return $func($msg);
	} else {
		die("This type of function does not exist!");
	}
}

function error404($msg="Not found!") {
	$error = file_get_contents(ROOT."errorpage/404.html");
	$error = str_replace('{%style%}', WEBROOT."errorpage/style.css", $error);
	$error = str_replace('{%error_msg%}', $msg, $error);
	die($error);
}

function errorsql($msg="Not found!") {
	$error = file_get_contents(ROOT."errorpage/sql.html");
	$error = str_replace('{%style%}', WEBROOT."errorpage/style.css", $error);
	$error = str_replace('{%title%}', "MySQL said:", $error);
	$error = str_replace('{%error_msg%}', $msg, $error);
	die($error);
}

function p($data, $die=false) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	if($die) die();
}