<?php 
	/* Created by Pothuguntla
		ID: 700638595. */
include '../Db_Connection.php';
require 'Books.php';
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	$books = new books();
	$books->viewBookings();
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>