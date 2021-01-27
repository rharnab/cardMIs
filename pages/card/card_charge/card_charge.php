<?php 
include('../database.php');
include('common.php');


$ch_query = mysql_query("SELECT total_card_fee, paid_fee_amt, due_fee_amt, account_no_file, card_no_file   FROM debit_charge_deduction  WHERE account_no_file !=''  order by sl  asc limit 10");
while($ch_result = mysql_fetch_array($ch_query))
{
	$total_card_fee = $ch_result['total_card_fee'];
	$paid_fee_amt = $ch_result['paid_fee_amt'];
	$due_fee_amt = $ch_result['due_fee_amt'];
	$account_no_file = $ch_result['account_no_file'];
	$today = date('Y-m-d');
	$card_no_file = $ch_result['card_no_file'];
	
	


	if($total_card_fee != $paid_fee_amt)
	{

			   
			   $api_balance = balanceCheck($account_no_file);
			
			     $balance = str_replace(',', '',  $api_balance);
			     $log_balance = str_replace(',', '',  $api_balance);
			 if($balance > 0)
			 {

			 	if($balance >= $due_fee_amt)
			 	{
			 	    $l_balance = $balance - $due_fee_amt;

				 	$balance = number_format($l_balance, 2);

				 	$paid_amt = $paid_fee_amt+ $due_fee_amt;
				 	$paid_fee_amt = number_format($paid_amt, 2);
				 	$log_paid = number_format($due_fee_amt,2);
				 	$due_fee_amt = number_format(0,2);
				 	$sts = '1';

				 	
				 	$log_due = number_format(0,2);
				 	$log_balance = number_format($log_balance,2);

			 	}else{
			 		
			 		 $due_fee_amt = $due_fee_amt - $balance;
			 		 $paid_amt = $paid_fee_amt+ $balance;
			 		 $paid_fee_amt = number_format($paid_amt, 2);
			 		 $due_fee_amt = number_format($due_fee_amt, 2);
			 		 $sts = '2';

			 		 $log_paid = number_format($balance,2);
			 		 $balance= 0;
			 		 $balance = number_format($balance,2);
			 		 $log_due = number_format($due_fee_amt,2);
			 		 $log_balance = number_format($log_balance,2);
			 	}

			 	
			 	
			 		$charge_update = mysql_query("UPDATE debit_charge_deduction set paid_fee_amt = '$paid_fee_amt', due_fee_amt='$due_fee_amt', status='$sts' where card_no_file='$card_no_file' ");

			 		if($charge_update)
			 		{
						$api_data = chargeBalance($account_no_file, $log_paid);
						$batch_no = $api_data['batch_no'];
						$msg = $api_data['msg'];
						$TraceNoList = $api_data['TraceNoList'];
						
			 			$log_query = mysql_query("INSERT into card_charge_histry_log (card_no, acc_no, balance_amt, paid_amt, due_amt, charge_date, msg,batch_no,TraceNoList) values ('$card_no_file', '$account_no_file',  '$log_balance', '$log_paid', '$log_due', '$today', '$msg', '$batch_no', '$TraceNoList') ");
			 			 
			 			 
			 			 $msg = "success";
			 		}
					
					//$api_data = chargeBalance($account_no_file, $paid_amt);
					//echo $batch_no = $api_data['batch_no']."<br>";
					//echo $msg = $api_data['msg']."<br>";
					//echo $TraceNoList = $api_data['TraceNoList']."<br>";
					


			 		 
			 	
			 
			 	
			 }
			 

		
		
	}
	
	
}

if(isset($msg))
{
	echo $msg;
}







 ?>