<?php
	include '../Db_Connection.php';
	require 'class.profile_feedback.php';
			$updateTable = new updateTable();
	$updateTable->stdid	=	mysql_real_escape_string($_REQUEST['stdid']); //escapes special characters in string to use in sql query.
	$updateTable->fname	=	mysql_real_escape_string($_REQUEST['fname']);
	$updateTable->lname	=	mysql_real_escape_string($_REQUEST['lname']);
	$updateTable->email	=	mysql_real_escape_string($_REQUEST['email']);
	$updateTable->mobile	=	mysql_real_escape_string($_REQUEST['mobile']);	
	$updateTable->gender	=	mysql_real_escape_string($_REQUEST['gender']);
	$updateTable->profile();
	

?>