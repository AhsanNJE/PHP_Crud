<?php
$connection = new mysqli("localhost","root","","phpcrud");
function insert($fromData){
	global $connection;
	
	$_studentName = $fromData['studentName'];
	$_fName = $fromData['fName'];
	$_mName = $fromData['mName'];
	$_email = $fromData['email'];
	$_status = $fromData['status'];   

	if ($_studentName=="") {
		echo '<div class="alert alert-danger"><strong>Success:</strong> StudentName Field is Empty</div>';
	}
	elseif ($_fName=="") {
		echo '<div class="alert alert-danger"><strong>Success:</strong> FatherName Field is Empty</div>';
	}
	elseif($_mName==""){
		echo '<div class="alert alert-danger"><strong>Success:</strong> MotherName Field is Empty</div>';
	}
	elseif ($_email=="") {
		echo '<div class="alert alert-danger"><strong>Success:</strong> Email Field is Empty</div>';
	}
	elseif ($_status=="") {
		echo '<div class="alert alert-danger"><strong>Success:</strong> Status Field is Empty</div>';
	}else{

		$emailCheker = checkEmail($_email);
		if ($emailCheker == true) {
			echo '<div class="alert alert-warning"><strong>Warning:</strong> The Mail Already Exist.</div>';
		}
		else{
			$stm="INSERT INTO tbl_student(studentName,fName,mName,email,status)
			VALUES('$_studentName','$_fName','$_mName','$_email','$_status')";

			$_result = $connection->query($stm);

			if ($_result) {
				echo '<div class="alert alert-success"><strong>Success:</strong>Data Saved</div>';
			}
			else{
				echo '<div class="alert alert-danger"><strong>Error:</strong>Data Saved</div>';
			}

		}
		
	} 


}
function show(){
	global $connection;
	$stm = "SELECT * FROM tbl_student";
	$data = $connection->query($stm);
	return $data;
}

function checkEmail($email){
	global $connection;
	$stm = $connection->query("SELECT email FROM tbl_student WHERE email = '$email'");

	if($stm->num_rows > 0){
		return true;

	}
	else{
		return false;
	}
}

function findData($id){
	global $connection;
	$stm = $connection->query("SELECT * FROM tbl_student WHERE student_id='$id'");

	return $stm;
}

function updateData($id,$fromData){
	global $connection;

	$_studentName = $fromData['studentName'];
	$_fName = $fromData['fName'];
	$_mName = $fromData['mName'];
	$_email = $fromData['email'];
	$_status = $fromData['status'];

	$stm = $connection->query("UPDATE tbl_student SET studentName='$_studentName', fName='$_fName', mName='$_mName', email='$_email', status='$_status' WHERE student_id='$id'");

	if ($stm) {
		header("location: show.php");
	}
	else{
		echo '<div class="alert alert-danger"><strong>Error:</strong>Data Not Update</div>';
	}
}
function deleteData($id){
	global $connection;
	$stm = $connection->query("DELETE FROM tbl_student WHERE student_id = '$id'");
	if ($stm) {
		header("location: show.php");
	}
}
function Active($id){
		global $connection;
		$stm = $connection->query("UPDATE tbl_student SET status='1' WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
	}
	
	function Inactive($id){
		global $connection;
		$stm = $connection->query("UPDATE tbl_student SET status='2' WHERE student_id = '$id'");
		if ($stm) {
			header("location: show.php");
		}
	}


?>