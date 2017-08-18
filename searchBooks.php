<?php 
	/* Created by Pothuguntla
		ID : 700638595 */
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables.
{
	?>
	<html>
		<head>
			<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		</head>
		<body>
			<center><h2><span>Search Library Books</span></h2>
			<br>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table>
					<tr>  
					<tr> <td>Book Name *</td><td style="margin-left: 100px"><input type="text" name="book" required="required" placeholder="Book Name"> </td> </tr> 
					
					<tr><td>&nbsp;</td></tr> 
					<tr align="center"> <td colspan="2"><input id="button" type="submit" name="submit" value="Search"></td> </tr> 
					
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	if(isset($_REQUEST["submit"]))  //set request on submit.
	{
	require 'Books.php';
	$books = new books();
	$books->book=$_POST["book"];
	$books->searchBooks();
	
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	 
}
?>