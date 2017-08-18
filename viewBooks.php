<html>
	<!-- Created by Pothuguntla
		ID: 700638595 -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
<head>
<body>
	<center><h2><span>Library Books</span></h2>
	<br>
	<?php

	include '../Db_Connection.php'; //db connection.
	session_start();
	if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for session variables.
	{
		require 'class.book.php';
		$books = new books();
	
		$books->viewBooks();
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>