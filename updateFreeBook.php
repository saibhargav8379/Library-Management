<?php 
	/* Created by Pothuguntla
		ID: 700638595 */
		require 'class.book.php';
		$books = new books();
	$books->bookid=$_GET['id']; //get book id from viewFreeBooks.
	include '../Db_Connection.php';
	session_start();
	if(isset($_SESSION['lname']) && !empty($_SESSION['lname'])) //check for setting session variables.
	{
		$sql="Select * from freebooks where id='".$books->bookid."'"; //sql query.
		$result=$conn->query($sql); 
		if($result->num_rows>0) 
		{
			while ($row=$result->fetch_assoc()) //fetch result sequentially.
			{
				$name=$row["BookName"];
				$author=$row["Author"];
				$pub=$row["Publisher"];
				$pages=$row["Pages"];					
			}
		}			
	?>
	
	<html>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<body>
		
			<center>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<table>
					<tr>  <td>Book Id</td><td> <input type="text" name="id" readonly="readonly" value="<?php echo  $books->bookid; ?>"></td> </tr>
					<tr>  <td>Book Name *</td><td> <input type="text" name="bname" pattern="[a-z A-Z]*" required="required" value="<?php echo  $name; ?>"></td> </tr>
					<tr>  <td>Author *</td><td> <input type="text" name="author" pattern="[a-z A-Z]*" required="required" value="<?php echo  $author; ?>"></td> </tr> 
					<tr> <td>Publisher *</td><td> <input type="text" name="publisher" pattern="[a-z A-Z]*" required="required" value="<?php echo  $pub; ?>"></td> </tr> 
					<tr> <td>Pages *</td><td> <input type="text" name="pages" required="required" pattern="[0-9]*" value="<?php echo  $pages; ?>"></td> </tr>							 
					<tr><td>&nbsp;</td></tr>
					<tr align="center"> <td colspan="2">
					<input style="background-color:orange;" id="button" type="submit" name="submit" value="Update"></td> </tr> 
					
				</table>
			</form>
		</body>
	</html>
	
	<?php 
	
	if(isset($_REQUEST["submit"])) //set request on submit form.
	{	
		$books->bookname = $_REQUEST["bname"];
		$books->author = $_REQUEST["author"];
		$books->publisher = $_REQUEST["publisher"];
		$books->pages = $_REQUEST["pages"];
		$books->bookid = $_REQUEST["id"];
		$books->updateEBook();

		}
	}
	else
	{
		header('Refresh: 0; url=newfile.php');	
	}
?>