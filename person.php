<?php
class person
{
	public $userid;
	public $fname;
	public $lname;
	public $mobile;
	public $email;
	public $pwd;	
	public $gender;	
	
	public function register()
	{
		include 'Db_Connection.php';
		
		$sql="insert into student(studentid,firstname,lastname,mobile,emailid,password,gender) values('".$this->userid."','".$this->fname."','".$this->lname."','".$this->mobile."','".$this->email."','".$this->pwd."','".$this->gender."')";
		if ($conn->query($sql) === TRUE)
		{
			$sub="UCM Library Registration Details";
			$msg= "Congrats ".$this->fname." ".$this->lname.",\nYou Are Registered with UCM Library\nYour Registration Details\nUser ID: ".$this->userid."\nEmailId: ".$this->email."\nMobile Number: ".$this->mobile."\nand Password: ".$this->pwd."\nThank You.";
			$headers="From: sxp85950@ucmo.edu";
		
			mail($this->email, $sub, $msg, $headers);
		
			return 1;
		}
		else
			return  0;
		$conn->close();
	}
}
?>