<?php 
    include_once('../db/dbconnect.php');
    include_once('../functions/functions.php');
    session_start();

    $approve_id  = $_SESSION['id'];
    $approveDate = date('Y-m-d');
    $batch_num   = mt_rand(111111,999999);
    $status      = '';
    $acc_num     = "";

    if(isset($_POST['accno'])){
    	$acc_num = trim(mysql_real_escape_string($_POST['accno']));
    }
    if(isset($_POST['status'])){
        $status = trim(mysql_real_escape_string($_POST['status']));
    }

    $select_batch = $conn->prepare("SELECT * FROM debit_card_api WHERE approve_by_id=? AND approve_date=?");
    $select_batch->bindParam(1,$approve_id);
    $select_batch->bindParam(2,$approveDate);
    $select_batch->execute();
    $rowData = $select_batch->fetch(PDO::FETCH_ASSOC);

    $fb_num = '';

    if($rowData['batch_num'] == ''){
        $fb_num = $batch_num;
    }else{
        $fb_num = $rowData['batch_num'];
    }
    /*$number   = '1867536941';
    $message  = 'Dear A/H your request for issuance of DEBIT CARD has accepted at (branch) - SBAC BANK LTD.';*/
    

    // update debit card api approve_date //
    $update_aprrove = $conn->prepare("UPDATE debit_card_api SET card_status=?,approve_by_id=?,approve_date=?,batch_num=? WHERE accountno=?");
    $update_aprrove->bindParam(1,$status);
    $update_aprrove->bindParam(2,$approve_id);
    $update_aprrove->bindParam(3,$approveDate);
    $update_aprrove->bindParam(4,$fb_num);
    $update_aprrove->bindParam(5,$acc_num);
    if($update_aprrove->execute()){
        //send_mobile_sms($message,$phone);
        echo "<p class='alert alert-success'>Approve has been success!</p>";
    }else{
        echo "<p class='alert alert-warning'>Approve has been failed!</p>";
    }

?>