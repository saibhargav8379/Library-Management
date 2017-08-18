<?php 
	/* Created by Pothuguntla
		ID: 700638595 */

session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid']))
{
	require 'Books.php';
	$books = new books();
	$books->studentid=$_SESSION['stdid'];
	
	include '../Db_Connection.php';
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$bid=$_GET['id'];
		$sql5="Select * from books where Id='".$bid."' and status='True'";
		
		$result5=$conn->query($sql5);
		if($result5->num_rows>0)
		{
			if ($row=$result5->fetch_assoc())
			{
				$cost=$row["Cost"];
				$bname=$row["BookName"];
			}
		}
		else
		{
			?>
			<script type="text/javascript">
				alert("This book currently at waiting list");
				window.location.href = "Home.php";
			</script>
			<?php
		}	
	}
	
	
	?>
	
	<html>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
	<body>
	<center>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr><td>Book Id</td><td> <input type="text" name="bid" readonly="readonly" value="<?php echo  $bid; ?>"></td> </tr>
				<tr><td>User ID</td><td> <input type="text" name="stdid" readonly="readonly" value="<?php echo  $books->studentid; ?>"></td> </tr>
				<tr><td>From Date *</td><td> <input type="date" name="fdate" min="<?php echo date("Y-m-d"); ?>" required="required"></td> </tr> 
				<tr><td>To Date *</td><td> <input type="date" name="tdate" min="<?php echo date("Y-m-d"); ?>" required="required"></td> </tr>
				<tr><td>Delivery Type *</td><td>  <input type="radio" name="dtype" value="Store" checked="checked">Store
				<input type="radio" name="dtype" value="Home Delivery">Home Delivery</td> </tr>								
				<tr><td>Amount($)</td><td> <input type="text" name="cost" readonly="readonly" value="<?php echo  $cost; ?>"></td> </tr> 
				<tr><td>&nbsp;<input type="hidden" name="bname" readonly="readonly" value="<?php echo  $bname; ?>"></td></tr>
				<tr align="center"> <td colspan="2">
				<input id="button" type="submit" name="submit" value="Booking"></td> </tr> 	
			</table>
		</form>
	</body>
	</html>
	
	<?php 
	
	
	if(isset($_REQUEST["submit"]))
	{			
		$books->bookid=$_POST["bid"];
		$books->amount=$_POST["cost"];		
		$_SESSION['price']=$books->amount;
		
		$books->fromdate=$_POST["fdate"];		
		$books->todate=$_POST["tdate"];
		
		$datetime1 = new DateTime($books->fromdate);
		$datetime2 = new DateTime($books->todate);
		$days = $datetime1->diff($datetime2);
		echo $days->format('%a');
		$_SESSION['days']=$days->format('%a');
		$_SESSION['daycharge']=$days->format('%a');
		$books->charge=$books->amount+$_SESSION['daycharge'];
		$books->days=$_SESSION['days'];
		$_SESSION['fdate']=$books->fromdate;
		$_SESSION['tdate']=$books->todate;
		$_SESSION['bookname']=$_POST["bname"];
		$books->deliverytype=$_POST["dtype"];
		if($books->deliverytype=="Home Delivery")
			$books->status=0;
		else
			$books->status=1;						
		
		$books->booking();		
	}
}
else
{
	header('Refresh: 0; url=newfile.php');	
}
?>
