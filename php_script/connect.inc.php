<?php
	error_reporting();
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '';
	$mysqli_db = 'ibank';
	$mysqli_tb = 'customers';
	$mysqli_transaction_transfer = 'transaction_transfer';
	$mysqli_transaction_withdraw = 'transaction_withdraw';
	$con = mysqli_connect("127.0.0.1","root","","ibank");
	//mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Couldn\'t connect to Server');
	//mysql_select_db($mysql_db) or die('Couldn\'t connect to the Database');
?>