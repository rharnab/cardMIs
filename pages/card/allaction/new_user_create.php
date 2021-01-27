<?php 
	include('../db/dbconnect.php');

	$fname    = '';
	$lname    = '';
	$phone    = '';
	$email    = '';
	$accPer   = '';
	$brname   = '';
	$status   = '';
	$password = '';
	
	if(isset($_POST['fname'])){
		$fname = $_POST['fname'];
	}

	if(isset($_POST['lname'])){
		$lname = $_POST['lname'];
	}
	if(isset($_POST['phone'])){
		$phone = $_POST['phone'];
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	if(isset($_POST['accPer'])){
		$accPer = $_POST['accPer'];
	}
	if(isset($_POST['brname'])){
		$brname = $_POST['brname'];
	}
	if(isset($_POST['status'])){
		$status = $_POST['status'];
	}


	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	$sha1Pass   = sha1($password);
	$random_num = mt_rand(100,999);
	$cur_year   = date('Y');
	$auto_user_id = $cur_year.$random_num;
	$date = date('Y-m-d');

	if(!empty($fname) && !empty($lname) && !empty($phone) && !empty($email) /*&& !empty($accPer)*/ && !empty($brname) && !empty($status)){
		$user_insert = $conn->prepare("INSERT INTO users SET /*role_id=?,*/branch_id=?,user_fname=?,user_lname=?,user_id=?,user_pass=?,phone=?,email=?,status=?,create_date=?");
		/*$user_insert->bindParam(1,$accPer);*/
		$user_insert->bindParam(1,$brname);
		$user_insert->bindParam(2,$fname);
		$user_insert->bindParam(3,$lname);
		$user_insert->bindParam(4,$auto_user_id);
		$user_insert->bindParam(5,$sha1Pass);
		$user_insert->bindParam(6,$phone);
		$user_insert->bindParam(7,$email);
		$user_insert->bindParam(8,$status);
		$user_insert->bindParam(9,$date);
		if($user_insert->execute()){
			echo '<p class="alert alert-success">Successfully created user!</p>';
		}else{
			echo '<p class="alert alert-danger">System error!</p>';
		}
	}else{
		echo '<p class="alert alert-warning">Please fillup all input field!</p>';
	}
?>