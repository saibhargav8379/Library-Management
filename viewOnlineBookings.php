<?php 
		/* Created by Pothuguntla
			ID: 700638595. */
include '../Db_Connection.php';
session_start();
if(isset($_SESSION['lname']) && !empty($_SESSION['lname']))
{
	require 'class.book.php';
	$books = new books();
	$books->viewBookings();
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>