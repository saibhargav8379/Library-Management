<center>
<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
include '../Db_Connection.php'; //db connection.
session_start(); //start session.
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	require 'Books.php';
	$books = new books();
	
	$books->showallBooks();
}
else
{
	header('Refresh: 0; url=newfile.php');	
}

?>