<?php
	include 'Db_Connection.php';
	require 'person.php';
	$person=new person();
	
	$person->userid	=	mysql_real_escape_string($_REQUEST['stdid']);
	$person->fname	=	mysql_real_escape_string($_REQUEST['fname']);
	$person->lname	=	mysql_real_escape_string($_REQUEST['lname']);
	$person->email	=	mysql_real_escape_string($_REQUEST['email']);
	$person->mobile	=	mysql_real_escape_string($_REQUEST['mobile']);
	$person->pwd	=	mysql_real_escape_string($_REQUEST['pwd']);		
	$person->gender	=	mysql_real_escape_string($_REQUEST['gender']);			
	
	echo $person->register();	
			
?>