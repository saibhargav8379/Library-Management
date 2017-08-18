<?php
	include '../Db_Connection.php'; //db connection.
	session_start();
		require 'class.profile_feedback.php';
			$updateTable = new updateTable();
	$updateTable->old	=	mysql_real_escape_string($_REQUEST['oldpwd']); //escapes special characters in string to use in sql query.
	$updateTable->newPwd	=	mysql_real_escape_string($_REQUEST['newpwd']);		
	$updateTable->email	=	mysql_real_escape_string($_REQUEST['uname']);
	$updateTable->password();
			
?>