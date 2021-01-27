<?php 
include('../database.php');



function balanceCheck($acc_no)
{
	// cbs amount check api
	$customerClient          = new SoapClient("http://172.19.11.109:8081/FloraService.svc?wsdl");
	$customerAccountResponse = $customerClient->OFSCustomerDrawableAmt(
		array(
			"commonInfo" => array(
				"TrnBranchCode"   => "0077",
				"UserId"          => 644,
				"TransactionDate" => "2020-01-01",
				"Password"        => "Test@123"
			),
			"accountno" => $acc_no,
		)
	);

	$customerAccountArray = json_decode(json_encode($customerAccountResponse), True);  


	return $balance = $customerAccountArray['OFSCustomerDrawableAmtResult']['Balance'];
}

function chargeBalance($acc_no, $pId_amt)
{

	$branch_code = substr($acc_no, 0, 4);
	
	// Multiple Transaction
		$bankClient = new SoapClient("http://172.19.11.109:8081/FloraService.svc?wsdl");
		$bankResponse=$bankClient->DoMultipleTransaction(
			array(
				"transactionList" => array(
					// customer account which account debited
					array(
						"AccountNo"  => $acc_no,
						"Amount"     => $pId_amt,
						"DrCr"       => "DR",
						"ChequeNo"   => " ",
						"Remarks"    => "Invoice No - Test Card Bill",
						"BranchCode" => $branch_code
					),
					// Bank Account which account credited
					array(
						"AccountNo"  => "0067111003209",
						"Amount"     => $pId_amt,
						"DrCr"       => "CR",
						"ChequeNo"   => " ",
						"Remarks"    => "Invoice No -  - Hasan ",
						"BranchCode" => "0067"			
					)
				),
				"commonInfo" => array(			
					"TrnBranchCode"   => "0001",
					"UserId"          => 106,
					"Password"        => "Test@123",
					"TransactionDate" => "2020-01-01",
				)
			)
		);
		$response = json_decode(json_encode($bankResponse), True);
		//echo "<pre>";
		//print_r($response);
		$batch_no = $response['DoMultipleTransactionResult']['BatchNo'];
		$message = $response['DoMultipleTransactionResult']['Message'];
		$TraceNoList = $response['DoMultipleTransactionResult']['TraceNoList']['string'][0];
		
		return $api_data = array('batch_no' => $batch_no, 'msg'=> $message, 'TraceNoList'=> $TraceNoList );

		
		
		
		}

 ?>