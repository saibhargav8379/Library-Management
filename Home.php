<center>

	<span style="font-size: 25px;font-weight: bold;">Latest Books</span> 
	<br>
	<br>
	<?php 
		/* Created by Pothuguntla
			ID: 700638595 */
	session_start();
	if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
	{
		require 'Books.php';
		$books = new books();
		
		$books->showTopFiveBooks();
}
else
{
	header('Refresh: 0; url=newfile.php');	 
}