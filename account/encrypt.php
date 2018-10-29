<?php
require '../php_script/connect.inc.php';
	$time = time();
	$dmy = date('Y.m.d', $time);
	$t = date('h.i.sa',$time);
	$token = md5(stripslashes(mysqli_real_escape_string($con,$dmy.$t.$time.rand().rand(1,1000))));
?>