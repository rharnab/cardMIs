<?php include("../database.php") ?>

<?php 


//-----------------------------

$report_date = date('Y-m', strtotime($_POST['cib_date']));
$accounting_date=date('Y-m-t', strtotime($report_date." -1 month"));
$acc_dt_array = explode("-", $accounting_date);
$acc_year= $acc_dt_array[0];
$acc_month= $acc_dt_array[1];

$file_array = array();



//--------------------------------subject txt create----------------------------

if(!file_exists("subjects"))
mkdir("subjects");

$currentTime = date('YmdHis');


//$file_name = $currentTime.".txt";
$file_name = "077SJF".".txt";

array_push($file_array , $file_name);

$file="subjects/".$file_name;

$q=mysql_query("SELECT * from subject_info si where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month'");
$c=0;


$accounting_date=date("dmY",strtotime($accounting_date));
 //header 
 $f_i_code = "077";
 $production_date=date("dmY");
 $re_type = "H";
 $link_code = "000";

$header = $re_type.$f_i_code.$accounting_date.$production_date.$link_code;
$data_header = $header.str_repeat(" ", 1100 - strlen($header));


file_put_contents($file, $data_header.PHP_EOL, FILE_APPEND);


while($d=mysql_fetch_array($q))
{
	
	/*echo "<pre>";
	print_r($d);
	echo "<hr>";*/

	
	$record_type = $d['record_type'];
	$fi_code = $d['fi_code'];
	$acc_date = $d['acc_date'];
	$pro_date = $d['production_date'];
	$code_link = $d['code_link'];
	$branch_code = $d['branch_code'];
	$fi_subject_code = $d['fi_subject_code'];
	$title = $d['title'];
	$name = $d['name'];
	$father_title = $d['fathers_title'];
	$fathers_name = $d['fathers_name'];
	$mother_title = $d['mothers_title'];
	$mother_name = $d['mothers_name'];
	$spouse_title = $d['spouse_title'];
	$spouse = $d['spouse'];
	$sector_type = $d['sector_type'];
	$sector_code = $d['sector_code'];
	$gender = $d['gender'];
	$dath_of_brth = $d['dath_of_brth'];
	$place_of_birth = $d['place_of_birth'];
	$country_of_birth = $d['country_of_birth'];
	$nid_number = $d['nid_number'];
	$is_nid = $d['is_nid'];
	$tin_number = $d['tin_number'];
	$par_street = $d['parmanent_street'];
	$par_postal_code = $d['parmanent_postal_code'];
	$par_district = $d['parmanent_district'];
	$par_country_code = $d['parmanent_country_code'];
	$addi_street = $d['additional_street'];
	$addi_postal_code = $d['additional_postal_code'];
	$addi_district = $d['additional_district'];
	$addi_country_code = $d['additional_country_code'];
	$id_type = $d['id_type'];
	$id_nr = $d['id_nr'];
	$id_issue_dt = $d['id_issue_date'];
	$id_issue_cntry_code = $d['id_issue_country_code'];
	$phone_number = $d['phone_number'];
	$full_nid_number = $d['full_nid_number'];



	if($record_type !='')
	{
		if(strlen($record_type) == 1)
		{
			 $record_type;
		}else{
			 $record_type =  $record_type.str_repeat(" ", 1 - strlen($record_type));
		}

	}else{
		$record_type = str_repeat(" ", 1);
	}
	

	if($fi_code !='')
	{
		if(strlen($fi_code) == 3)
		{
			 $fi_code;
		}else{
			 $fi_code =  $fi_code.str_repeat(" ", 3 - strlen($fi_code));
		}

	}else{
		$fi_code = str_repeat(" ", 3);
	}

	

	if($branch_code !='')
	{
		if(strlen($branch_code) == 4)
		{
			 $branch_code;
		}else{
			 $branch_code =  $branch_code.str_repeat(" ", 4 - strlen($branch_code));
		}

	}else{
		$branch_code = str_repeat(" ", 4);
	}


	if($fi_subject_code !='')
	{
		if(strlen($fi_subject_code) == 16)
		{
			 $fi_subject_code;
		}else{
			 $fi_subject_code =  $fi_subject_code.str_repeat(" ", 16 - strlen($fi_subject_code));
		}

	}else{
		$fi_subject_code = str_repeat(" ", 16);
	}

	if($title !='')
	{
		if(strlen($title) == 20)
		{
			 $title;
		}else{
			 $title =  $title.str_repeat(" ", 20 - strlen($title));
		}

	}else{
		$title = str_repeat(" ", 20);
	}

	if($name !='')
	{
		if(strlen($name) == 70)
		{
			   $name;
		}else{
			   $name =  $name.str_repeat(" ", 70 - strlen($name));
		}

	}else{
		$name = str_repeat(" ", 70);
	}

	if($father_title !='')
	{
		if(strlen($father_title) == 20)
		{
			 $father_title;
		}else{
			 $father_title =  $father_title.str_repeat(" ", 20 - strlen($father_title));
		}

	}else{
		$father_title = str_repeat(" ", 20);
	}

	if($fathers_name !='')
	{
		if(strlen($fathers_name) == 70)
		{
			 $fathers_name;
		}else{
			  $fathers_name =  $fathers_name.str_repeat(" ", 70 - strlen($fathers_name));
		}

	}else{
		$fathers_name = str_repeat(" ", 70);
	}

	if($mother_title !='')
	{
		if(strlen($mother_title) == 20)
		{
			 $mother_title;
		}else{
			 $mother_title =  $mother_title.str_repeat(" ", 20 - strlen($mother_title));
		}

	}else{
		$mother_title = str_repeat(" ", 20);
	}


	if($mother_name !='')
	{
		if(strlen($mother_name) == 70)
		{
			 $mother_name;
		}else{
			 $mother_name =  $mother_name.str_repeat(" ", 70 - strlen($mother_name));
		}

	}else{
		$mother_name = str_repeat(" ", 70);
	}


	if($spouse_title !='')
	{
		if(strlen($spouse_title) == 20)
		{
			 $spouse_title;
		}else{
			 $spouse_title =  $spouse_title.str_repeat(" ", 20 - strlen($spouse_title));
		}

	}else{
		$spouse_title = str_repeat(" ", 20);
	}


	if($spouse !='')
	{
		if(strlen($spouse) == 70)
		{
			 $spouse;
		}else{
			 $spouse =  $spouse.str_repeat(" ", 70 - strlen($spouse));
		}

	}else{
		$spouse = str_repeat(" ", 70);
	}


	if($sector_type !='')
	{
		if(strlen($sector_type) == 1)
		{
			 $sector_type;
		}else{
			 $sector_type =  $sector_type.str_repeat(" ", 1 - strlen($sector_type));
		}

	}else{
		$sector_type = str_repeat(" ", 1);
	}

	if($sector_code !='')
	{
		if(strlen($sector_code) == 6)
		{
			 $sector_code;
		}else{
			 $sector_code = $sector_code.str_repeat(" ", 6 - strlen($sector_code));
		}

	}else{
		$sector_code = str_repeat(" ", 6);
	}


	if($gender !='')
	{
		if(strlen($gender) == 1)
		{
			 $gender;
		}else{
			 $gender =  $gender.str_repeat(" ", 1 - strlen($gender));
		}

	}else{
		$gender = str_repeat(" ", 1);
	}



	if($dath_of_brth !='')
	{

		$brth_array = date('d-m-Y', strtotime($dath_of_brth));
		 $birth_dt = explode("-",  $brth_array);
		 $dath_of_brth =  $birth_dt[0].$birth_dt[1].$birth_dt[2];

		if(strlen($dath_of_brth) == 8)
		{
			 $dath_of_brth;
		}else{
			 $dath_of_brth =  $dath_of_brth.str_repeat(" ", 8 - strlen($dath_of_brth));
		}

	}else{
		$dath_of_brth = str_repeat(" ", 8);
	}



	if($place_of_birth !='')
	{
		if(strlen($place_of_birth) == 20)
		{
			 $place_of_birth;
		}else{
			 $place_of_birth =  $place_of_birth.str_repeat(" ", 20 - strlen($place_of_birth));
		}

	}else{
		$place_of_birth = str_repeat(" ", 20);
	}



	if($country_of_birth !='')
	{
		if(strlen($country_of_birth) == 2)
		{
			 $country_of_birth;
		}else{
			 $country_of_birth =  $country_of_birth.str_repeat(" ", 2 - strlen($country_of_birth));
		}

	}else{
		$country_of_birth = str_repeat(" ", 2);
	}


	if($nid_number !='')
	{
		

		if(strlen($nid_number) == 13)
		{
			 $nid_number;
		}
		else if(strlen($nid_number) >  13)
		{
			 $nid_number = substr($nid_number, strlen($nid_number) - 13);
		}

		else{
			 $nid_number =  $nid_number.str_repeat(" ", 13 - strlen($nid_number));
		}

	}else{
		$nid_number = str_repeat(" ", 13);
	}

	

	if($is_nid !='')
	{
		if(strlen($is_nid) == 1)
		{
			 $is_nid;
		}else{
			 $is_nid =  $is_nid.str_repeat(" ", 1 - strlen($is_nid));
		}

	}else{
		$is_nid = str_repeat(" ", 1);
	}


	if($tin_number !='')
	{
		
		if(strlen($tin_number) == 12)
		{
			 $tin_number;
		}
		else if(strlen($tin_number) > 12 ){
			$tin_number = substr($tin_number, strlen($tin_number) - 12);
		}
		else{
			 $tin_number =  $tin_number.str_repeat(" ", 12 - strlen($tin_number));
		}

	}else{
		$tin_number = str_repeat(" ", 12);
	}


	if($par_street !='')
	{
		if(strlen($par_street) == 70)
		{
			 $par_street;
		}

		else{
			 $par_street =  $par_street.str_repeat(" ", 70 - strlen($par_street));
		}

	}else{
		$par_street = str_repeat(" ", 70);
	}



	if($par_postal_code !='')
	{
		if(strlen($par_postal_code) == 4)
		{
			 $par_postal_code;
		}else{
			 $par_postal_code =  $par_postal_code.str_repeat(" ", 4 - strlen($par_postal_code));
		}

	}else{
		$par_postal_code = str_repeat(" ", 4);
	}


	if($par_district !='')
	{
		if(strlen($par_district) == 20)
		{
			 $par_district;
		}else{
			 $par_district =  $par_district.str_repeat(" ", 20 - strlen($par_district));
		}

	}else{
		$par_district = str_repeat(" ", 20);
	}


	if($par_country_code !='')
	{
		if(strlen($par_country_code) == 2)
		{
			 $par_country_code;
		}else{
			 $par_country_code =  $par_country_code.str_repeat(" ", 2 - strlen($par_country_code));
		}

	}else{
		$par_country_code = str_repeat(" ", 2);
	}



	if($addi_street !='')
	{
		if(strlen($addi_street) == 70)
		{
			 $addi_street;
		}else{
			 $addi_street =  $addi_street.str_repeat(" ", 70 - strlen($addi_street));
		}

	}else{
		$addi_street = str_repeat(" ", 70);
	}


	if($addi_postal_code !='')
	{
		if(strlen($addi_postal_code) == 4)
		{
			 $addi_postal_code;
		}else{
			 $addi_postal_code =  $addi_postal_code.str_repeat(" ", 4 - strlen($addi_postal_code));
		}

	}else{
		$addi_postal_code = str_repeat(" ", 4);
	}


	if($addi_district !='')
	{
		if(strlen($addi_district) == 20)
		{
			 $addi_district;
		}else{
			 $addi_district =  $addi_district.str_repeat(" ", 20 - strlen($addi_district));
		}

	}else{
		$addi_district = str_repeat(" ", 20);
	}


	if($addi_country_code !='')
	{
		if(strlen($addi_country_code) == 2)
		{
			 $addi_country_code;
		}else{
			 $addi_country_code =  $addi_country_code.str_repeat(" ", 2 - strlen($addi_country_code));
		}

	}else{
		$addi_country_code = str_repeat(" ", 2);
	}



	if($id_type !='')
	{
		if(strlen($id_type) == 1)
		{
			 $id_type;
		}else{
			 $id_type =  $id_type.str_repeat(" ", 1 - strlen($id_type));
		}

	}else{
		$id_type = str_repeat(" ", 1);
	}



	if($id_nr !='')
	{
		if(strlen($id_nr) == 20)
		{
			 $id_nr;
		}else{
			 $id_nr =  $id_nr.str_repeat(" ", 20 - strlen($id_nr));
		}

	}else{
		$id_nr = str_repeat(" ", 20);
	}



	if($id_issue_dt !='')
	{
		 $id_issue_array = date('d-m-Y', strtotime($id_issue_dt));
		 $issue_dt = explode("-",  $id_issue_array);
		 $id_issue_dt =  $issue_dt[0].$issue_dt[1].$issue_dt[2];

		if(strlen($id_issue_dt) == 8)
		{
			 $id_issue_dt;
		}else{
			 $id_issue_dt =  $id_issue_array.str_repeat(" ", 8 - strlen($id_issue_dt));
		}

	}else{
		$id_issue_dt = str_repeat(" ", 8);
	}


	if($id_issue_cntry_code !='')
	{
		if(strlen($id_issue_cntry_code) == 2)
		{
			 $id_issue_cntry_code;
		}else{
			 $id_issue_cntry_code =  $id_issue_cntry_code.str_repeat(" ", 2 - strlen($id_issue_cntry_code));
		}

	}else{
		$id_issue_cntry_code = str_repeat(" ", 2);
	}



	if($phone_number !='')
	{
		if(strlen($phone_number) == 20)
		{
			 $phone_number;
		}else{
			 $phone_number =  $phone_number.str_repeat(" ", 20 - strlen($phone_number));
		}

	}else{
		$phone_number = str_repeat(" ", 20);
	}



	if($full_nid_number !='')
	{
		
		if(strlen($full_nid_number) == 17)
		{
			 $full_nid_number;
		}
		else if(strlen($full_nid_number) > 17)
		{
			$full_nid_number = substr($full_nid_number, strlen($full_nid_number) - 17);
		}
		else{
			 $full_nid_number =  $full_nid_number.str_repeat(" ", 17 - strlen($full_nid_number));
		}

	}else{
		 $full_nid_number = str_repeat(" ", 17);
	}






$header_row = $record_type.$fi_code.$branch_code.$fi_subject_code;





$content =$header_row.$title.$name.$father_title.$fathers_name.$mother_title.$mother_name.$spouse_title.$spouse.$sector_type.$sector_code.$gender.$dath_of_brth.$place_of_birth.$country_of_birth.$nid_number.$is_nid.$tin_number.$par_street.$par_postal_code.$par_district.$par_country_code.$addi_street.$addi_postal_code.$addi_district.$addi_country_code.$id_type.$id_nr.$id_issue_dt.$id_issue_cntry_code.$phone_number.$full_nid_number;


$data_content = $content.str_repeat(" ", 1100 - strlen($content));

//echo strlen($data_content);
$write_data  = $data_content.PHP_EOL;

file_put_contents($file, $write_data, FILE_APPEND);




}


 $update_sql = mysql_query("SELECT status, code_link from subject_info where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month' ");
 $update_result = mysql_fetch_array($update_sql);

  $sts =$update_result['status'];
 if($sts == '0')
 {
 	$sts = 1;
 	$sub_code_link = 1;
 }else{
 	$sub_code_link =$update_result['code_link'] + 1;
 }

mysql_query("UPDATE subject_info set status = '$sts', code_link='$sub_code_link' where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month' ");

//-------------------------------- end subject txt create----------------------------
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

//------------------------------start contract file-------------------------------------------------------

if(!file_exists("contracts"))
mkdir("contracts");

//$currentTime = date('YmdHis');

//$file_name2= $currentTime.".txt";
$file_name2= "077CNF".".txt";

array_push($file_array , $file_name2);
$file_2="contracts/".$file_name2;






$q=mysql_query("SELECT * from contracts_info cc where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month'");
$c=0;



$accounting_date=date("dmY",strtotime($accounting_date));
 //header 
 $f_i_code = "077";
 $production_date=date("dmY");
 $re_type = "H";
 $link_code = "000";

$header = $re_type.$f_i_code.$accounting_date.$production_date.$link_code;

$data_header = $header.str_repeat(" ", 600- strlen($header));

file_put_contents($file_2, $data_header.PHP_EOL, FILE_APPEND);


while($d=mysql_fetch_array($q))
{
	
	/*echo "<pre>";
	print_r($d);
	echo "<hr>";*/
	$record_type = $d['record_type'];
	$fi_code = $d['fi_code'];
	$branch_code = $d['branch_code'];
	$fi_subject_code = $d['fi_subject_code'];
	$fi_contract_code = $d['fi_contract_code'];
	$contract_type = $d['contract_type'];
	$contract_phase = $d['contract_phase'];
	$contract_status = $d['contract_status'];
	$currency_code = $d['currency_code'];
	$currency_code_of_credit = $d['currency_code_of_credit'];
	$starting_date_of_contract = $d['starting_date_of_contract'];
	$request_date_of_the_contract = $d['request_date_of_the_contract'];
	$planned_end_date_of_the_contract = $d['planned_end_date_of_the_contract'];
	$actual_end_date_of_the_contract = $d['actual_end_date_of_the_contract'];
	$periodicity_of_payment = $d['periodicity_of_payment'];
	$method_of_payment = $d['method_of_payment'];
	$mnth_installment_amt = $d['monthly_instalment_amt'];
	$section_limit = $d['section_limit'];
	$exp_dt_next_installment = $d['exp_date_of_next_installment'];
	$remaining_amt = $d['remaining_amt'];
	$overdue_or_not_paid_installment = $d['number_of_overdue_and_not_paid_installment'];
	$overdue_amt = $d['overdue_amt'];
	$dt_of_last_chrg = $d['date_of_last_charge'];
	$type_of_installment = $d['type_of_installment'];
	$amt_chrg_month = $d['amount_charged_in_the_month'];
	$flag_card_month = $d['flag_card_used_in_the_month'];
	$monthly_used_card = $d['monthly_card_used_in_the_month'];
	$payment_delay_number = $d['payment_delay_number'];
	$recovery_due = $d['recovery_due'];
	$recovery_report_period = $d['recovery_during_the_reporting_period'];
	$comulative_recovery = $d['cumulative_recovery'];
	$dt_law_suit = $d['date_of_law_suit'];
	$dt_of_classification = $d['date_of_classification'];
	$rescheduled_number = $d['no_of_times_rescheduled'];
	$economic_purpose_code = $d['economic_purpose_code'];
	$defaulter_flag = $d['defaulter_flag'];
	$total_disburse_amt = $d['total_disburse_amt'];
	$outstanding_amt = $d['outstanding_amt'];
	$flag_update = $d['flag_update'];



	if($record_type !='')
	{
		if(strlen($record_type) == 1)
		{
			 $record_type;
		}else{
			 $record_type =  $record_type.str_repeat(" ", 1 - strlen($record_type));
		}

	}else{
		$record_type = str_repeat(" ", 1);
	}


	if($fi_code !='')
	{
		if(strlen($fi_code) == 3)
		{
			 $fi_code;
		}else{
			 $fi_code =  $fi_code.str_repeat(" ", 3 - strlen($fi_code));
		}

	}else{
		$fi_code = str_repeat(" ", 3);
	}


	if($branch_code !='')
	{

		if(strlen($branch_code) == 4)
		{
			 $branch_code;
		}else{
			 $branch_code =  $branch_code.str_repeat(" ", 4 - strlen($branch_code));
		}

	}else{
		$branch_code = str_repeat(" ", 4);
	}


	if($fi_subject_code !='')
	{
		
		if(strlen($fi_subject_code) == 16)
		{
			 $fi_subject_code;
		}else{
			 $fi_subject_code =  $fi_subject_code.str_repeat(" ", 16 - strlen($fi_subject_code));
		}

	}else{
		$fi_subject_code = str_repeat(" ", 16);
	}
	

	if($fi_contract_code !='')
	{
		if(strlen($fi_contract_code) == 16)
		{
			 $fi_contract_code;
		}else{
			 $fi_contract_code =  $fi_contract_code.str_repeat(" ", 16 - strlen($fi_contract_code));
		}

	}else{
		$fi_contract_code = str_repeat(" ", 16);
	}
	

	if($contract_type !='')
	{
		if(strlen($contract_type) == 2)
		{
			 $contract_type;
		}else{
			 $contract_type =  $contract_type.str_repeat(" ", 2 - strlen($contract_type));
		}

	}else{
		$contract_type = str_repeat(" ", 2);
	}

	if($contract_phase !='')
	{

		if(strlen($contract_phase) == 2)
		{
			 $contract_phase;
		}else{
			 $contract_phase =  str_repeat(" ", 2 - strlen($contract_phase)).$contract_phase;
		}

	}else{
		$contract_phase = str_repeat(" ", 2);
	}

	if($contract_status !='')
	{
		if(strlen($contract_status) == 1)
		{
			 $contract_status;
		}else{
			 $contract_status =  $contract_status.str_repeat(" ", 1 - strlen($contract_status));
		}

	}else{
		$contract_status = str_repeat(" ", 1);
	}

	if($currency_code !='')
	{
		if(strlen($currency_code) == 3)
		{
			 $currency_code;
		}else{
			 $currency_code =  $currency_code.str_repeat(" ", 3 - strlen($currency_code));
		}

	}else{
		$currency_code = str_repeat(" ", 3);
	}

	if($currency_code_of_credit !='')
	{
		if(strlen($currency_code_of_credit) == 3)
		{
			 $currency_code_of_credit;
		}else{
			 $currency_code_of_credit =  $$currency_code_of_credit.str_repeat(" ", 3 - strlen($currency_code_of_credit));
		}

	}else{
		$currency_code_of_credit = str_repeat(" ", 3);
	}


	if($starting_date_of_contract !='')
	{
		$st_contract = date('d-m-Y', strtotime($starting_date_of_contract));
		$st_contract_array  = explode("-",  $st_contract);
		$starting_date_of_contract =  $st_contract_array[0].$st_contract_array[1].$st_contract_array[2];

		if(strlen($starting_date_of_contract) == 8)
		{
			 $starting_date_of_contract;
		}else{
			 $starting_date_of_contract =  $starting_date_of_contract.str_repeat(" ", 8 - strlen($starting_date_of_contract));
		}

	}else{
		$starting_date_of_contract = str_repeat(" ", 8);
	}


	if($request_date_of_the_contract !='')
	{
		$re_contract = date('d-m-Y', strtotime($request_date_of_the_contract));
		$re_contract_array  = explode("-",  $re_contract);
		$request_date_of_the_contract =  $re_contract_array[0].$re_contract_array[1].$re_contract_array[2];

		if(strlen($request_date_of_the_contract) == 8)
		{
			 $request_date_of_the_contract;
		}else{
			 $request_date_of_the_contract =  $request_date_of_the_contract.str_repeat(" ", 8 - strlen($request_date_of_the_contract));
		}

	}else{
		$request_date_of_the_contract = str_repeat(" ", 8);
	}


	if($planned_end_date_of_the_contract !='')
	{
		$plan_contract = date('d-m-Y', strtotime($planned_end_date_of_the_contract));
		$pl_contract_array  = explode("-",  $plan_contract);
		$planned_end_date_of_the_contract =  $pl_contract_array[0].$pl_contract_array[1].$pl_contract_array[2];

		if(strlen($planned_end_date_of_the_contract) == 8)
		{
			 $planned_end_date_of_the_contract;
		}else{
			 $planned_end_date_of_the_contract =  $planned_end_date_of_the_contract.str_repeat(" ", 8 - strlen($planned_end_date_of_the_contract));
		}

	}else{
		$planned_end_date_of_the_contract = str_repeat(" ", 8);
	}

	if($actual_end_date_of_the_contract !='')
	{
		$actual_contract = date('d-m-Y', strtotime($actual_end_date_of_the_contract));
		$actual_contract_array  = explode("-",  $actual_contract);
		$actual_end_date_of_the_contract =  $actual_contract_array[0].$actual_contract_array[1].$actual_contract_array[2];


		if(strlen($actual_end_date_of_the_contract) == 8)
		{
			 $actual_end_date_of_the_contract;
		}else{
			 $actual_end_date_of_the_contract =  $actual_end_date_of_the_contract.str_repeat(" ", 8 - strlen($actual_end_date_of_the_contract));
		}

	}else{
		$actual_end_date_of_the_contract = str_repeat(" ", 8);
	}

	

	if($periodicity_of_payment !='')
	{
		if(strlen($periodicity_of_payment) == 1)
		{
			 $periodicity_of_payment;
		}else{
			 $periodicity_of_payment =  $periodicity_of_payment.str_repeat(" ", 1 - strlen($periodicity_of_payment));
		}

	}else{
		$periodicity_of_payment = str_repeat(" ", 1);
	}
	

	if($method_of_payment !='')
	{
		if(strlen($method_of_payment) == 3)
		{
			 $method_of_payment;
		}else{
			 $method_of_payment =  $method_of_payment.str_repeat(" ", 3 - strlen($method_of_payment));
		}

	}else{
		$method_of_payment = str_repeat(" ", 3);
	}



	if($mnth_installment_amt !='')
	{
		if(strlen($mnth_installment_amt) == 12)
		{
			 $mnth_installment_amt;
		}else{
			 $mnth_installment_amt =  $mnth_installment_amt.str_repeat(" ", 12 - strlen($mnth_installment_amt));
		}

	}else{
		$mnth_installment_amt = str_repeat(" ", 12);
	}


	if($section_limit !='')
	{
		if(strlen($section_limit) == 12)
		{
			 $section_limit;
		}else{
			 $section_limit =  $section_limit.str_repeat(" ", 12 - strlen($section_limit));
		}

	}else{
		$section_limit = str_repeat(" ", 12);
	}


	if($exp_dt_next_installment !='')
	{
		$exp_ins = date('d-m-Y', strtotime($exp_dt_next_installment));
		$exp_ins_array  = explode("-",  $exp_ins);
		$exp_dt_next_installment =  $exp_ins_array[0].$exp_ins_array[1].$exp_ins_array[2];

		if(strlen($exp_dt_next_installment) == 8)
		{
			 $exp_dt_next_installment;
		}else{
			 $exp_dt_next_installment =  $exp_dt_next_installment.str_repeat(" ", 8 - strlen($exp_dt_next_installment));
		}

	}else{
		$exp_dt_next_installment = str_repeat(" ", 8);
	}


	if($remaining_amt !='')
	{
		
		if(strlen($remaining_amt) == 12)
		{
			   $remaining_amt;
		}else{
			   $remaining_amt = $remaining_amt.str_repeat(" ", 12 - strlen($remaining_amt));
		}

	}else{
		$remaining_amt = str_repeat(" ", 12);
	}


	if($overdue_or_not_paid_installment !='')
	{
		if(strlen($overdue_or_not_paid_installment) == 3)
		{
			 $overdue_or_not_paid_installment;
		}else{
			 $overdue_or_not_paid_installment =  $overdue_or_not_paid_installment.str_repeat(" ", 3 - strlen($overdue_or_not_paid_installment));
		}

	}else{
		$overdue_or_not_paid_installment = str_repeat(" ", 3);
	}


	if($overdue_amt !='')
	{
		
		if(strlen($overdue_amt) == 12)
		{
			 $overdue_amt;
		}else{
			  $overdue_amt =  $overdue_amt.str_repeat(" ", 12 - strlen($overdue_amt));
		}

	}else{
		$overdue_amt = str_repeat(" ", 12);
	}


	if($dt_of_last_chrg !='')
	{
		$dt_lst = date('d-m-Y', strtotime($dt_of_last_chrg));
		$dt_lst_array  = explode("-",  $dt_lst);
		$dt_of_last_chrg =  $dt_lst_array[0].$dt_lst_array[1].$dt_lst_array[2];

		if(strlen($dt_of_last_chrg) == 8)
		{
			 $dt_of_last_chrg;
		}else{
			 $dt_of_last_chrg =  $dt_of_last_chrg.str_repeat(" ", 8 - strlen($dt_of_last_chrg));
		}

	}else{
		$dt_of_last_chrg = str_repeat(" ", 8);
	}


	if($type_of_installment !='')
	{
		if(strlen($type_of_installment) == 1)
		{
			 $type_of_installment;
		}else{
			 $type_of_installment =  $type_of_installment.str_repeat(" ", 1 - strlen($type_of_installment));
		}

	}else{
		$type_of_installment = str_repeat(" ", 1);
	}


	if($amt_chrg_month !='')
	{
		if(strlen($amt_chrg_month) == 12)
		{
			 $amt_chrg_month;
		}else{
			 $amt_chrg_month =  $amt_chrg_month.str_repeat(" ", 12 - strlen($amt_chrg_month));
		}

	}else{
		$amt_chrg_month = str_repeat(" ", 12);
	}


	if($flag_card_month !='')
	{
		if(strlen($flag_card_month) == 1)
		{
			 $flag_card_month;
		}else{
			 $flag_card_month =  $flag_card_month.str_repeat(" ", 1 - strlen($flag_card_month));
		}

	}else{
		$flag_card_month = str_repeat(" ", 1);
	}


	if($monthly_used_card !='')
	{
		if(strlen($monthly_used_card) == 2)
		{
			 $monthly_used_card;
		}else{
			 $monthly_used_card =  $monthly_used_card.str_repeat(" ", 2 - strlen($monthly_used_card));
		}

	}else{
		$monthly_used_card = str_repeat(" ", 2);
	}

	if($payment_delay_number !='')
	{
		if(strlen($payment_delay_number) == 3)
		{
			 $payment_delay_number;
		}else{
			 $payment_delay_number =  $payment_delay_number.str_repeat(" ", 3 - strlen($payment_delay_number));
		}

	}else{
		$payment_delay_number = str_repeat(" ", 3);
	}


	if($recovery_due !='')
	{
		if(strlen($recovery_due) == 12)
		{
			 $recovery_due;
		}else{
			 $recovery_due =  $recovery_due.str_repeat(" ", 12 - strlen($recovery_due));
		}

	}else{
		$recovery_due = str_repeat(" ", 12);
	}






	if($recovery_report_period !='')
	{
		if(strlen($recovery_report_period) == 12)
		{
			 $recovery_report_period;
		}else{
			 $recovery_report_period =  $recovery_report_period.str_repeat(" ", 12 - strlen($recovery_report_period));
		}

	}else{
		$recovery_report_period = str_repeat(" ", 12);
	}



	if($comulative_recovery !='')
	{
		if(strlen($comulative_recovery) == 12)
		{
			 $comulative_recovery;
		}else{
			 $comulative_recovery =  $comulative_recovery.str_repeat(" ", 12 - strlen($comulative_recovery));
		}

	}else{
		$comulative_recovery = str_repeat(" ", 12);
	}


	

	

	if($dt_law_suit !='')
	{
		$dt_lw = date('d-m-Y', strtotime($dt_law_suit));
		$dt_lw_array  = explode("-",  $dt_lw);
		$dt_law_suit =  $dt_lw_array[0].$dt_lw_array[1].$dt_lw_array[2];

		if(strlen($dt_law_suit) == 8)
		{
			 $dt_law_suit;
		}else{
			 $dt_law_suit =  $dt_law_suit.str_repeat(" ", 8 - strlen($dt_law_suit));
		}

	}else{
		$dt_law_suit = str_repeat(" ", 8);
	}


	

	if($dt_of_classification !='')
	{
		$dt_class = date('d-m-Y', strtotime($dt_of_classification));
		$dt_class_array  = explode("-",  $dt_class);
		$dt_of_classification =  $dt_class_array[0].$dt_class_array[1].$dt_class_array[2];
		if(strlen($dt_of_classification) == 8)
		{
			 $dt_of_classification;
		}

		else{
			 $dt_of_classification =  $dt_of_classification.str_repeat(" ", 8 - strlen($dt_of_classification));
		}

	}else{
		$dt_of_classification = str_repeat(" ", 8);
	}



	if($rescheduled_number !='')
	{
		if(strlen($rescheduled_number) == 6)
		{
			 $rescheduled_number;
		}else{
			 $rescheduled_number =  $rescheduled_number.str_repeat(" ", 6 - strlen($rescheduled_number));
		}

	}else{
		$rescheduled_number = str_repeat(" ", 6);
	}


	if($economic_purpose_code !='')
	{

		if(strlen($economic_purpose_code) == 4)
		{
			 $economic_purpose_code;
		}else{
			 $economic_purpose_code =  $economic_purpose_code.str_repeat(" ", 4 - strlen($economic_purpose_code));
		}

	}else{
		$economic_purpose_code = str_repeat(" ", 4);
	}


	if($defaulter_flag !='')
	{

		if(strlen($defaulter_flag) == 1)
		{
			 $defaulter_flag;
		}else{
			 $defaulter_flag =  $defaulter_flag.str_repeat(" ", 1 - strlen($defaulter_flag));
		}

	}else{
		$defaulter_flag = str_repeat(" ", 1);
	}



	if($total_disburse_amt !='')
	{
		if(strlen($total_disburse_amt) == 12)
		{
			 $total_disburse_amt;
		}else{
			 $total_disburse_amt =  $total_disburse_amt.str_repeat(" ", 12 - strlen($total_disburse_amt));
		}

	}else{
		$total_disburse_amt = str_repeat(" ", 12);
	}


	if($outstanding_amt !='')
	{

		if(strlen($outstanding_amt) == 12)
		{
			 $outstanding_amt;
		}else{
			 $outstanding_amt =  $outstanding_amt.str_repeat(" ", 12 - strlen($outstanding_amt));
		}

	}else{
		$outstanding_amt = str_repeat(" ", 12);
	}


	if($flag_update !='')
	{
		if(strlen($flag_update) == 1)
		{
			 $flag_update;
		}else{
			 $flag_update =  $flag_update.str_repeat(" ", 1 - strlen($flag_update));
		}

	}else{
		$flag_update = str_repeat(" ", 1);
	}


	




$gape_filler = str_repeat(" ", 168);



$header_row = $record_type.$f_i_code.$branch_code.$fi_subject_code;



$content =$header_row.$fi_contract_code.$contract_type.$contract_phase.$contract_status.$currency_code.$currency_code_of_credit.$starting_date_of_contract.$request_date_of_the_contract.$planned_end_date_of_the_contract.$actual_end_date_of_the_contract.$gape_filler.$periodicity_of_payment.$method_of_payment.$mnth_installment_amt.$section_limit.$exp_dt_next_installment.$remaining_amt.$overdue_or_not_paid_installment.$overdue_amt.$dt_of_last_chrg.$type_of_installment.$amt_chrg_month.$flag_card_month.$monthly_used_card.$payment_delay_number.$recovery_due.$recovery_report_period.$comulative_recovery.$dt_law_suit.$dt_of_classification.$rescheduled_number.$economic_purpose_code.$defaulter_flag.$total_disburse_amt.$outstanding_amt.$flag_update;



$data_content = $content.str_repeat(" ", 600 - strlen($content));
//echo strlen($content)."<br>";



$write_data  = $data_content.PHP_EOL;

file_put_contents($file_2, $write_data, FILE_APPEND);



}

array_push($file_array, $file_2);

mysql_query("UPDATE contracts_info set status='1' where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month'");




//------------------------------end  contract file-------------------------------------------------------



    


    
 
    
    $dir = 'cib_archive/';
    $zipname = 'cib_archive_'.date('YmdHis').".zip";
    $zip_dir = 'cib_archive/'.$zipname;
    $zip = new ZipArchive;
    $zip->open($zip_dir, ZipArchive::CREATE);

    
    $zip->addFile("subjects/".$file_name, $file_name);
    $zip->addFile("contracts/".$file_name2, $file_name2);
    
    $zip->close();

    unlink("subjects/".$file_name);
    unlink("contracts/".$file_name2);

    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename="'.basename($zip_dir).'"');
    header('Content-Length: ' . filesize($zip_dir));
    readfile($zip_dir);


//history update for cib

$download_by = $_SESSION['login_id'];
$download_timestamp = date('Y-m-d H:i:s');
$download_file= $zip_dir;

mysql_query("UPDATE cib_history_log set  download_file = '$download_file', download_by='$download_by', download_timestamp='$download_timestamp' ");


 ?>


 


