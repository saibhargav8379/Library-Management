<?php
include '../Db_Connection.php'; //db connection.
require 'class.payment.php'; //class page
session_start(); //start session.
$payment = new pay();
	$payment->chname	=	mysql_real_escape_string($_REQUEST['chname']);	//escapes special characters in string to use in sql query.
	$payment->bank	=	mysql_real_escape_string($_REQUEST['bank']);		
	$payment->card	=	mysql_real_escape_string($_REQUEST['card']);
	$payment->cardno	=	mysql_real_escape_string($_REQUEST['cardno']);
	$payment->cvv	=	mysql_real_escape_string($_REQUEST['cvv']);
	$payment->acc	=	mysql_real_escape_string($_REQUEST['acc']);
	$payment->bookingid	=	mysql_real_escape_string($_REQUEST['bid']);
	$payment->amount	=	mysql_real_escape_string($_REQUEST['amount']);
		
	echo $payment->payment();
?>