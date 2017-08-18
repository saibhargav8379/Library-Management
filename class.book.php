<?php
class books
{		
	public $bookid;
	public $bookname;
	public $author;
	public $publisher;
	public $pages;
	public $amount;
	public $image;
	public $status;
	public $userID;
	public $feedback;
	public $fdate;
	public $tdate;
	public $days;
	public $deliveryType;
	public $deliveryCharge;
	
	public function addPaidBooks()
	{
		include '../Db_Connection.php';
		
		
		$sql="insert into books(BookName,Author,Publisher,Pages,Cost,Image,status) values('".$this->bookname."','".$this->author."','".$this->publisher."','".$this->pages."','".$this->amount."','".$this->image."','".$this->status."')";
		if ($conn->query($sql) === TRUE) {
			echo "New Book successfully Added";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close(); //closing the connection.
	}
	public function addEBooks() {
		include '../Db_Connection.php';
		
			$sql="insert into freebooks(BookName,Author,Publisher,Pages,Document,status) values('".$this->bookname."','".$this->author."','".$this->publisher."','".$this->pages."','".$this->image."','".$this->status."')"; //sql query.
			if ($conn->query($sql) === TRUE) { //check connection runs query successfully.
				echo "New E-Book successfully Added";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}		
			$conn->close(); //close connection
	}
	
	public function viewBooks() {
		include '../Db_Connection.php';
			$sql="select * from books"; //sql query
		$res=$conn->query($sql); 
		
		if($res->num_rows>0)
		{
		?>
		<center>
		<table border="2">
		  <thead>
			<tr style="color: green;">
			  <th></th> 
			  <th></th> 
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
			  while($row = $res->fetch_assoc()){ //result display in tbody.
					$this->bookid=$row["Id"];
					$this->bookname = $row["BookName"];
					$this->author = $row["Author"];
					$this->publisher = $row["Publisher"];
					$this->pages = $row["Pages"];
					$this->amount = $row["Cost"];
					$this->status = $row["status"];
					$this->image = $row["Image"];
				  echo "<tr><td><a href='updateBook.php?id=$this->bookid'>Edit</a></td><td><a href='deleteBook.php?id=$this->bookid'>Delete</a></td><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td>{$this->amount}</td><td>{$this->status}</td><td><img height='80px' width='120px' src={$this->image}></td></tr>\n";
				}            
			?>
		  </tbody>
		</table>
	<?php 
	}
	else 
		echo "No Books found";
	}
	
	public function viewEBooks() {
			include '../Db_Connection.php';
			$sql="select * from freebooks";
			$res=$conn->query($sql);
			
			if($res->num_rows>0)
			{
			?>
			<center>
			<table border="2">
			  <thead>
				<tr style="color: green;">
				  <th></th>
				  <th></th>  
				  <th>Book Name</th>      
				  <th>Author</th>
				  <th>Publisher</th> 
				  <th>Pages</th>	                
				  <th>Document</th>
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
						$this->image=$row["Document"];
					  echo "<tr><td><a href='updateFreeBook.php?id=$this->bookid'>Edit</a></td><td><a href='deleteFreeBook.php?id=$this->bookid'>Delete</a></td><td>{$this->bookname}</td><td>{$this->author}</td><td>{$this->publisher}</td><td>{$this->pages}</td><td>{$this->image}</td></tr>\n";
					}            
				?>
			  </tbody>
			</table>
		<?php 
		}
		else 
			echo "No Books found";
	}
	
	public function feedback() {
		include '../Db_Connection.php';
		
		$sql="select * from Feedback";
	$res=$conn->query($sql);
	
	if($res->num_rows>0)
	{
	?>
	<center>
	<table border="2">
	  <thead  style="color: green;">
	    <tr>
	      <th>User ID</th>      
	      <th>Feedback</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	    	while($row = $res->fetch_assoc()){ //display result in tbody.
				$this->userID=$row["User"];
				$this->feedback=$row["Feedback"];
	          echo "<tr><td>{$this->userID}</td><td>{$this->feedback}</td></tr>\n";
	        }      
	    ?>
	  </tbody>
	</table>
	
	<?php 
	}
	else
		echo "No rows found";
	}
	
	public function viewBookings() {
		include '../Db_Connection.php';
		?>
	<html>
	<body>
		<center><h2><span>Booking History</span></h2>
		<br>
		<?php
		
		$sql="select books.Id,booking.fdate,booking.tdate,booking.days,booking.Delivery_Type,booking.Delivery_Charge,booking.Total_Amount,books.BookName,books.Cost,books.Image from booking inner join books on booking.bookid=books.Id where books.Status='False' and booking.BookStatus='0'";
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
			  <th></th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			while($row = $res->fetch_assoc()){
					$this->bookid=$row["Id"];
					$this->bookname=$row["BookName"];
					$this->cost=$row["Cost"];
					$this->fdate=$row["fdate"];
					$this->tdate=$row["tdate"];
					$this->days=$row["days"];
					$this->deliveryType=$row["Delivery_Type"];
					$this->deliveryCharge=$row["Delivery_Charge"];
					$this->amount=$row["Total_Amount"];
					$this->image=$row["Image"];
					
				  echo "<tr><td>{$this->bookname}</td><td>{$this->cost}</td><td>{$this->fdate}</td><td>{$this->tdate}</td><td>{$this->days}</td><td>{$this->deliveryType}</td><td>{$this->deliveryCharge}</td><td>{$this->amount}</td><td><img height='80px' width='120px' src={$this->image}></td><td><a href='returnBook.php?id=$this->bookid'>Return</a></td></tr>\n";
				}
			  
			?>
		  </tbody>
		</table>
	
	<?php 
	}
	else
		echo "No bookings found";
	
	}
	
	public function deleteBook() {
		include '../Db_Connection.php'; //database connection
			$this->bookid=$_GET['id'];
		
		$sql = "Delete from books where Id='".$this->bookid."'"; //sql query
		if ($conn->query($sql) === TRUE) { //if connection runs query
	    header('location: viewBooks.php'); //head to viewBooks page
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
		}
	
		$conn->close();
	}
	
	public function deleteEBook() {
		include '../Db_Connection.php'; //database connection.
			$this->bookid=$_GET['id'];
	$sql = "Delete from freebooks where id='".$this->bookid."'"; //sql query.
	if ($conn->query($sql) === TRUE) { //check connection runs query
	    header('location: viewFreeBooks.php'); //head location to viewFreeBooks.
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
	}
	
	$conn->close();
	}
	
	public function returnBook() {
		include '../Db_Connection.php'; //db connection
			$this->bookid=$_GET['id']; //get variable from other file.
	
	$sql="update books set status='True' where Id='".$this->bookid."'"; //sql query
	if ($conn->query($sql) === TRUE) { //if connection runs query.
	
	$sql2="update booking set BookStatus='1' where bookid='".$this->bookid."'"; //sql query
	if ($conn->query($sql2) === TRUE)
    header('location: viewOnlineBookings.php'); //head to viewOnlineBookings page
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
	}
	
	$conn->close();	//close connection.
	}
	
	public function updateBook() {
			include '../Db_Connection.php'; //db connection
			$sql="update books set BookName='".$this->bookname."',Author='".$this->author."',Publisher='".$this->publisher."',Pages='".$this->pages."',Cost='".$this->amount."' where Id='".$this->bookid."'"; //sql query.
		
		if ($conn->query($sql) === TRUE) {
			header('location: viewBooks.php'); //head location to viewBooks.
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	}
	
	public function updateEBook() {
		include '../Db_Connection.php'; //db connection
				$sql="update freebooks set BookName='".$this->bookname."',Author='".$this->author."',Publisher='".$this->publisher."',Pages='".$this->pages."' where id='".$this->bookid."'";
		
		if ($conn->query($sql) === TRUE) { //if connection runs query
			header('location: viewFreeBooks.php'); //head location to viewFreeBooks.
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
		}
		
		$conn->close();
	}
}