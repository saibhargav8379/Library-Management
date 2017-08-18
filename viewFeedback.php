<html>
	<!-- Created by Pothuguntla
		ID: 700638595 -->
<body>
<center><h2><span>Feedback</span></h2>
<br>
<?php 

include '../Db_Connection.php'; //sql connection
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for connection.
{
			require 'class.book.php';
			$books = new books();
	
			$books->feedback();
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>