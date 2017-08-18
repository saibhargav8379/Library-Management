<?php 
		/* created by Pothuguntla
			ID: 700638595 */
	include '../Db_Connection.php'; //database connection
	require 'class.book.php';
	$books = new books();
	$books->deleteEBook();
?>