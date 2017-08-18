<?php 
	/* created by Pothuguntla
		ID:700638595 */
include '../Db_Connection.php';
session_start();
if(isset($_SESSION['stdid']) && !empty($_SESSION['stdid'])) //check for setting session variables
{
	require 'class.profile_feedback.php';
			$updateTable = new updateTable();
	$updateTable->stdid=$_SESSION['stdid']; //student id session.
	?>
	<html>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
			<center><h2><span>Feedback</span></h2>
			<br>
			<form method="POST" action="Feedback.php"> 
				<table>
					<tr>  
					<tr> <td>700#</td><td> <input type="text" name="sid" id = "sid" disabled="disabled" value="<?php echo $updateTable->stdid; ?>"></td> </tr> 
					<tr> <td>Feedback *</td><td> <textarea name="fb" rows="5" required="required"></textarea></td> </tr> 
					<tr><td>&nbsp;</td></tr> 
					<tr align="center"> <td colspan="2"><input style="background-color:orange;" id="button" type="submit" name="submit" value="Submit"></td></tr>
				</table>
			</form>
			 <br>
		</body>
	</html>
	
	<?php 
	
		if(isset($_REQUEST["submit"])) //set request on submit.
		{			
			$updateTable->feedback = $_POST["fb"];
			$updateTable->feedback();
			
		}
}
	else
	{
		header('Refresh: 0; url=newfile.php');	//head to newfile.
	}
?>