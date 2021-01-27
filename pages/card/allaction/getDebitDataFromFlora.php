<?php
	include_once("../db/dbconnect.php");
	session_start();
	$user_id = $_SESSION['id'];
	$currentDate = date('Y-m-d'); // current date //
	$accNumber  = '';
	$noc        = '';
	$otherPhone = '';
	$otherEmail = '';

	if(isset($_POST['data'])){
		$accNumber = mysql_real_escape_string($_POST['data']);
	}
	if(isset($_POST['noc'])){
		$noc = mysql_real_escape_string($_POST['noc']);
	}
	if(isset($_POST['otherPhone'])){
		$otherPhone = mysql_real_escape_string($_POST['otherPhone']);
	}
	if(isset($_POST['otherEmail'])){
		$otherEmail = mysql_real_escape_string($_POST['otherEmail']);
	}

	// get data from flora api //
	$file_get_contents = file_get_contents("http://172.19.11.1/CBS_API/account_info?acc=$accNumber");
	$api_data = json_decode($file_get_contents,true); // creating array //

	if(empty($api_data)){
		echo "<p class='alert alert-warning'>Please enter valid account number!</p>";
	}else{
		$debit_insert = $conn->prepare("INSERT INTO debit_card_api SET accountno=?,customerid=?,accounttype=?,actypecode=?,accountname=?,accstatus=?,accnameoncard=?,accopendate=?,accfather=?,nationalid=?,accphone=?,accotheremail=?,accotherphone=?,accaddress=?,accdateofbirth=?,accsex=?,bal_tk=?,entry_by_id=?,requestDate=?");

		$substr = substr($api_data['accountno'],4,3); // get  account type code //

		$debit_insert->bindParam(1,$api_data['accountno']);
		$debit_insert->bindParam(2,$api_data['customer']);
		$debit_insert->bindParam(3,$api_data['glhead']);
		$debit_insert->bindParam(4,$substr);
		$debit_insert->bindParam(5,$api_data['acname']);
		$debit_insert->bindParam(6,$api_data['status']);
		$debit_insert->bindParam(7,$noc);
		$debit_insert->bindParam(8,$api_data['opend']);
		$debit_insert->bindParam(9,$api_data['father_hus']);
		$debit_insert->bindParam(10,$api_data['National_id']);
		$debit_insert->bindParam(11,$api_data['pre_mobilno']);
		$debit_insert->bindParam(12,$otherEmail);
		$debit_insert->bindParam(13,$otherPhone);
		$debit_insert->bindParam(14,$api_data['sub_head_addr']);
		$debit_insert->bindParam(15,$api_data['dob']);
		$debit_insert->bindParam(16,$api_data['sex']);
		$debit_insert->bindParam(17,$api_data['bal_tk']);
		$debit_insert->bindParam(18,$user_id);
		$debit_insert->bindParam(19,$currentDate);
		if($debit_insert->execute()){
			echo "<p class='alert alert-success'>You has been successfully created request!</p>";
		}else{
			echo "<p class='alert alert-danger'>System error occurred!</p>";
		}
	}
?>