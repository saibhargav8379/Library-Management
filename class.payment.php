<?php
class pay
{
	public $chname;
	public $bank;
	public $card;
	public $cardno;
	public $cvv;
	public $acc;	
	public $bookingid;	
	public $amount;	
	
	public function payment()
	{
		include '../Db_Connection.php';
		$sql="insert into payment(bookingid,Total_Amount,CardholderName,Bank,Type,Accno,CardNo,CvvNo) values('".$this->bookingid."','".$this->amount."','".$this->chname."','".$this->bank."','".$this->card."','".$this->acc."','".$this->cardno."','".$this->cvv."')";
		if ($conn->query($sql) === TRUE) {
	
			$sql2="update books set status='False' where Id='".$_SESSION['bbbbbbid']."'"; //sql query for books.
			$conn->query($sql2);

			$sql3="update booking set status='1' where id='".$this->bookingid."'"; //sql query for booking.
			$conn->query($sql3);
	
			return 1;	
		} else 
			
			return 0;

		$conn->close(); //connection close.
		
	}
}
?>