<?php
class books
{		
	public $studentid;	
	public $bookid;
	public $bookingid;
	public $userid;
	public $fromdate;
	public $todate;
	public $deliverytype;
	public $amount;
	public $days;
	public $charge;
	public $totalamount;
	public $datetime1;
	public $datetime2;
	public $status;
	public $bookname;
	public $author;
	public $publisher;
	public $pages;
	public $image;
	public $document;
	public $book;
	public $ebook;
	public $cost;
	
	public function showTopFiveBooks()
	{
		include '../Db_Connection.php';
		
		$sql="select * from books ORDER BY Id DESC limit 5";
		$res=$conn->query($sql);
		
		if($res->num_rows>0)
		{
			?>
				
				<table style="background-color: #FFE4C4;border-radius:8px;color: red;" border = "8">
				  <thead style="background-color: black">
					<tr style="color: #FFE4C4; font-weight:900;">
					  <th>Book Name</th>      
					  <th>Author</th>
					  <th>Publisher</th> 
					  <th>Pages</th>
					  <th>Cost($)</th>
					  <th>Available</th>           
					  <th>Image</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
					 while($row = $res->fetch_assoc()){
						$this->bookid=$row["Id"];
						$this->bookname=$row["BookName"];
						$this->author=$row["Author"];
						$this->publisher=$row["Publisher"];
						$this->pages=$row["Pages"];
						$this->amount=$row["Cost"];
						$this->status=$row["status"];
						$this->image=$row["Image"];
			          echo "<tr><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td>{$this->amount}</td><td>{$this->status}</td><td><img height='80px' width='120px' src={$this->image}></td><td><a href='onlineBooking.php?id=$this->bookid'>Rent</a></td></tr>\n";
			        }      
			    ?>
				  </tbody>
				</table>
				
				<?php 
				}
				else
				{
					echo "\nThere are currently no books found";
				}
				?>
				<br>
				<span style="font-size: 25px;font-weight: bold;">E-Books</span>
				<br>
				<br>
				<?php
				$sql="select * from freebooks ORDER BY id DESC limit 5";
					$res=$conn->query($sql);
				
				if($res->num_rows>0)
				{
				?>
				
				<table style="background-color: #FFE4C4; font-size: 14px;line-height: 2; padding: 5px 15px 15px 15px; ;" border="1">
				  <thead>
					<tr style="color: green;">
					  <th>Book Name</th>
					  <th>Author</th>
					  <th>Publisher</th> 
					  <th>Pages</th>              
					  <th>Download</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
					while($row = $res->fetch_assoc()){
							$this->bookid=$row["id"];
							$this->bookname=$row["BookName"];
							$this->author=$row["Author"];
							$this->publisher=$row["Publisher"];
							$this->pages=$row["Pages"];														
							$this->document=$row["Document"];
							
						  echo "<tr><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td><a href='downloadFIle.php?file=$this->document'> Download </a></td></tr>\n";
						}      
					?>
				  </tbody>
				</table>
		</center>
			<?php 
			}
			else
				echo "There are currently no Books found";
	}
	
	public function showallBooks()
	{
		include '../Db_Connection.php';
		$sql="select * from books ORDER BY Id DESC";
		$res=$conn->query($sql);
		
		if($res->num_rows>0)
		{
			?>
			<br>
			<br>
			<span style="font-size: 25px;font-weight: bold;">List of all Library Books</span> 
			<br>
			<br>
			<table border="2">
			  <thead>
			    <tr style="color: green;">
			      <th>Book Name</th>      
			      <th>Author</th>
			      <th>Publisher</th> 
			      <th>Pages</th>
			      <th>Cost ($)</th>
			      <th>Available</th>           
			      <th>Image</th>
			    </tr>
			  </thead>
			  <tbody>
			    <?php
			    while($row = $res->fetch_assoc()){
						$this->bookid=$row["Id"];
						$this->bookname=$row["BookName"];
						$this->author=$row["Author"];
						$this->publisher=$row["Publisher"];
						$this->pages=$row["Pages"];
						$this->amount=$row["Cost"];
						$this->status=$row["status"];
						$this->image=$row["Image"];
			          echo "<tr><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td>{$this->amount}</td><td>{$this->status}</td><td><img height='80px' width='120px' src={$this->image}></td><td><a href='onlineBooking.php?id=$this->bookid'>Rent</a></td></tr>\n";
			        }      
			    ?>
			  </tbody>
			</table>
			
			<?php 
			}
			else
				echo "\nNo books found at this time.";
	}
	
	public function searchBooks() {
		include '../Db_Connection.php'; //db connection
	
		$sql="select * from books where BookName='".$this->book."' ORDER BY Id DESC"; //sql query.
		$res=$conn->query($sql);
	
		if($res->num_rows>0)
		{
		?>
		<center>
		<br>
		<table style="background-color: #FFE4C4">
		  <thead>
		    <tr style="color: green;">
		      <th>Book Name</th>      
		      <th>Author</th>
		      <th>Publisher</th> 
		      <th>Pages</th>
		      <th>Cost ($)</th>
		      <th>Status</th>           
		      <th>Image</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    while($row = $res->fetch_assoc()){
				$this->bookid=$row["Id"];
						$this->bookname=$row["BookName"];
						$this->author=$row["Author"];
						$this->publisher=$row["Publisher"];
						$this->pages=$row["Pages"];
						$this->amount=$row["Cost"];
						$this->status=$row["status"];
						$this->image=$row["Image"];
			          echo "<tr><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td>{$this->amount}</td><td>{$this->status}</td><td><img height='80px' width='120px' src={$this->image}></td><td><a href='onlineBooking.php?id=$this->bookid'>Rent</a></td></tr>\n";
		        }      
		    ?>
		  </tbody>
		</table>
		</center>
		<?php 
		}
		else
			echo "No Books Found with this Book Name";
		
	
	}
	
	public function eBooks() {
		include '../Db_Connection.php'; //db connection
		
				$sql="select * from freebooks where BookName='".$this->ebook."' ORDER BY id DESC"; //sql query.
		$res=$conn->query($sql);
	
		if($res->num_rows>0)
		{
		?>
		<center>
		<br>
		<table border="2">
		  <thead>
		    <tr style="color: green;">
		      <th>Book Name</th>
		      <th>Author</th>
		      <th>Publisher</th> 
		      <th>Pages</th>              
		      <th>Download</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    while($row = $res->fetch_assoc()){
							$this->bookid=$row["id"];
							$this->bookname=$row["BookName"];
							$this->author=$row["Author"];
							$this->publisher=$row["Publisher"];
							$this->pages=$row["Pages"];														
							$this->document=$row["Document"];
							
						  echo "<tr><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td><a href='downloadFIle.php?file=$this->document'> Download </a></td></tr>\n";
		        }      
		    ?>
		  </tbody>
		</table>
		</center>
		<?php 
		}
		else
			echo "No Books Found for this Book Name";
	}
	
	public function booking()
	{			
		include '../Db_Connection.php';
		$sql="insert into booking(studentid,bookid,fdate,tdate,days,Delivery_type,Delivery_Charge,Total_Amount,status,BookStatus) values('".$this->studentid."','".$this->bookid."','".$this->fromdate."','".$this->todate."','".$this->days."','".$this->deliverytype."','0','".$this->charge."','".$this->status."','0')";
		if ($conn->query($sql) === TRUE) {
			$this->bookingid=$conn->insert_id;
			$this->amount=$this->charge + 10;
			$_SESSION['bookingid']=$this->bookingid;
				
			if ($this->deliverytype=="Home Delivery")
			{
				$sql3="update booking set Delivery_Charge='10', Total_Amount='".$this->amount."' where id='".$this->bookingid."'";
				$conn->query($sql3);
		
				$_SESSION['bbbbbbid']=$this->bookid;
				$_SESSION['charges']=10;
				$_SESSION['amount']=$this->amount;
				header('location: Payment.php');
			}
			else
			{
				$sql2="update books set status='False' where Id='".$this->bookid."'";
				$conn->query($sql2);
		
				$_SESSION['charges']=0;
				$_SESSION['amount']=$this->charge;
				header('location: Summary.php');
			}
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	}
	
	public function viewBookings() {
		include '../Db_Connection.php';
		$this->studentid=$_SESSION['stdid'];
	?>
	<html>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
		<body>
			<center><h2><span>Booking History</span></h2>
			<br>
			<?php
			//sql query.
			$sql="select booking.fdate,booking.tdate,booking.days,booking.Delivery_Type,booking.Delivery_Charge,booking.Total_Amount,books.BookName,books.Cost,books.Image from booking inner join books on booking.bookid=books.Id where booking.studentid='".$this->studentid."' and booking.Status = '1' ";
			$res=$conn->query($sql);
			
			if($res->num_rows>0)
			{
			?>
			<center>
			<table border="2">
			  <thead>
				<tr style="color: green;">    
				  <th>Book Name</th>      	      
				  <th>Cost ($)</th>
				  <th>From Date</th>
				  <th>To Date</th>
				  <th>Days</th>
				  <th>Delivery Type</th>
				  <th>Delivery Charge($)</th>
				  <th>Total Amount ($)</th>	                
				  <th>Image</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				while($row = $res->fetch_assoc()){
					
						$this->bookname=$row["BookName"];
						$this->cost=$row["Cost"];
						$this->fromdate=$row["fdate"];
						$this->todate=$row["tdate"];
						$this->days=$row["days"];
						$this->deliverytype=$row["Delivery_Type"];
						$this->charge=$row["Delivery_Charge"];
						$this->amount=$row["Total_Amount"];
						$this->image=$row["Image"];
					  echo "<tr><td>{$this->bookname}</td><td>{$this->cost}</td><td>{$this->fromdate}</td><td>{$this->todate}</td><td>{$this->days}</td><td>{$this->deliverytype}</td><td>{$this->charge}</td><td>{$this->amount}</td><td><img height='80px' width='120px' src={$this->image}></td></tr>\n";
					}	      
				?>
			  </tbody>
			</table>
	
	<?php 
	}
	else
		echo "No bookings made till date.";
		
	}
}
?>