<?php include('../database.php'); ?>

<?php 

//fetch branch code
function  fetch_brach_code($name)
{
	$br_query = mysql_query("select br_name, br_code from branch b where br_name ='$name'");
	$br_result =mysql_fetch_array($br_query);
	return $br_result;

}

//fetch contracts_phase
function  fetch_contract_phase($status)
{
	if($status =='Restricted')
	{
		$st = 'Refused';
	}
	else if($status =='Closed')
	{
		$st = 'Terminated';
	}
	else if($status =='Closed')
	{
		$st = 'Terminated';
	}else{
		$st = 'Living';
	}
	$phase_query = mysql_query("select value, description from contract_phases cp  where description='$st'");
	$phase_result =mysql_fetch_array($phase_query);
	return $phase_result;

}

//fetch from sectorlis

function fetch_sector_list()
{
	$sector_list = mysql_query("SELECT code from sector_list where name='Service Holders (Salaried Person)' ");
	$sector_result = mysql_fetch_array($sector_list);
	return $sector_result['code'];
}

//fetch from contract type

function fetch_contract_type()
{
	$contract_query = mysql_query("SELECT value from contract_types where description ='Credit Card (Revolving)' ");
	$contract_result = mysql_fetch_array($contract_query);
	return $contract_result['value'];
}

function fetch_currency_code()
{
	$currency_sql= mysql_query("SELECT value from currency_codes where description ='Bangladeshi taka' ");
	$currency_result = mysql_fetch_array($currency_sql);
	return $currency_result['value'];
}

function fetch_periodicity()
{
	$periodicity_sql= mysql_query("SELECT value from periodicity where description ='monthly instalments-30 days' ");
	$periodicity_result = mysql_fetch_array($periodicity_sql);
	return $periodicity_result['value'];
}

function fetch_payment()
{
	$payment_sql= mysql_query("SELECT value from payment_method where description ='Cash' ");
	$payment_result = mysql_fetch_array($payment_sql);
	return $payment_result['value'];
}

 ?>