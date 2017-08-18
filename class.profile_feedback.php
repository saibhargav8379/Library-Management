<?php
 class updateTable
 {
	 public $stdid;
	 public $feedback;
	 public $fname;
	 public $lname;
	 public $email;
	 public $mobile;
	 public $gender;
	  public $newPwd;
		 public $old;
	 
	 public function feedback() {
			include '../Db_Connection.php';
			
		 	$sql="insert into Feedback (User,Feedback) values('".$this->stdid."','".$this->feedback."')"; //sql query.
			if ($conn->query($sql) === TRUE) { //connection true.
				echo "Feedback sent Successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error; //gives error.
			}
			
			$conn->close(); //close connection.
			
	 }
	 
	 public function profile() {
		 
		 include '../Db_Connection.php';
		 
		 	$sql="update student set firstname='".$this->fname."',lastname='".$this->lname."',mobile='".$this->mobile."',gender='".$this->gender."',emailid='".$this->email."' where studentid='".$this->stdid."'";
	if ($conn->query($sql) === TRUE) 
	{		
		echo 1;			
	}
		else
			echo 0;
			
		
	$conn->close();
			
	 }
	 
	 public function password() {
		
		 include '../Db_Connection.php';
		 	$sql="update student set password='".$this->newPwd."' where emailid='".$this->email."' and password='".$this->old."'";
			if ($conn->query($sql) === TRUE) {
				$_SESSION['userpwd']=$this->newPwd;		//change session userpwd to new password.
				echo 1;			
			}
				else
					echo 0;
					
		
	$conn->close();
	 }
 }
 