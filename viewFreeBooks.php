<html>
	<!-- created by Pothuguntla
		ID: 700638595 -->
<head>
	<body>
		<center><h2><span>E-Books</span></h2>
		<br>
		<?php

		include '../Db_Connection.php';
		session_start();
		if(isset($_SESSION['lname']) && !empty($_SESSION['lname']))
		{
				require 'class.book.php';
				$books = new books();
	
				$books->viewEBooks();
	}
	else
	{
		header('Refresh: 0; url=newfile.php');	
	}
	?>