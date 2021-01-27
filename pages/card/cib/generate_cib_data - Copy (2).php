<?php include('../database.php'); ?>
<?php include('cib_common.php'); ?>

<?php 

 $report_date = $_POST['cib_date'];
 $date_array = explode('-', $report_date);
 $report_year = $date_array[0];
 $report_month = $date_array[1];


//cib generate data remove

 $subject_dup = mysql_query("SELECT reporting_date from subject_info si where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$subject_result  = mysql_fetch_array($subject_dup);


$contracts_dup = mysql_query("SELECT reporting_date from contracts_info ci where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$contracts_result  = mysql_fetch_array($contracts_dup);

if($subject_result !='' &&  $contracts_result !='')
{
   mysql_query("DELETE  from subject_info  where year(reporting_date)='$report_year' and month(reporting_date)='$report_month'");
   mysql_query("DELETE  from contracts_info  where year(reporting_date)='$report_year' and month(reporting_date)='$report_month'");
   
}
//cib generate data remove




//cl file check
$cl_file = mysql_query("SELECT reporting_date from cl_table ct where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$cl_file_result = mysql_fetch_array($cl_file);

//mis file check
$mis_file = mysql_query("SELECT reporting_date from mis_table mt where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$mis_file_result = mysql_fetch_array($mis_file);

if($cl_file_result == '')
{
	echo "SORRY CL FILE NOT IMPORT YET FOR THIS CIB REPORT";

}else if($cl_file_result == '')
{
	echo "SORRY MIS FILE NOT IMPORT YET FOR THIS CIB REPORT";
}else{
	
	//crate data for cib

$mis_query = mysql_query("SELECT title, customer_name, date_of_birth, fathers_name, mothers_name, sex, national_id, tin, mobile_no, reporting_date, passport_no, client_id from mis_table mt where year(reporting_date)='$report_year' and month(reporting_date)='$report_month'");
$suject_insert =0;
$contracts_insert =0;
if(mysql_num_rows($mis_query) > 0)
{
	while($mis_result = mysql_fetch_array($mis_query))
	{
		if($mis_result['national_id'] !='')
		{

			if(strlen($mis_result['national_id']) ==17 )
			{
				 $full_nid_number = $mis_result['national_id'];
				
			}
			else if(strlen($mis_result['national_id']) == 13){

				  if($mis_result['date_of_birth'] !='')
				  {

					  $birth_array = explode("/", $mis_result['date_of_birth']); 
					  $birth_year = $birth_array[2];
					  $full_nid_number = $birth_year.$mis_result['national_id'];

				  }else{
				  	$full_nid_number ='';
				  }
				  
				  
			}

			if(strlen($mis_result['national_id']) == 13 )
			{
				 $nid_13 = $mis_result['national_id'];
			}

			$is_nid = 1;

		}else{
			$full_nid_number = '';
			$nid_13 ='';
			$is_nid='';
		}

		if( ($mis_result['passport_no'] !='') &&  ($mis_result['passport_no'] != 'NA'))
		{
			$id_type ='2';
		    $id_nr = $mis_result['passport_no'];
		}else{
			$id_type ='';
		    $id_nr = '';
		}
		

		
		$reporting_date = $mis_result['reporting_date'];

		$record_type = 'D';
		$fi_code = '007';
		$acc_date = date('Y-m-t', strtotime($mis_result['reporting_date']));
		$production_date = '';
		$code_link = '';
		$branch_code = '';
		$fi_subject_code = $mis_result['client_id'];
		$title = $mis_result['title'];
		$name = $mis_result['customer_name'];
		$fathers_title ='';
		$fathers_name = $mis_result['fathers_name'];
		$mothers_title='';
		$mothers_name = $mis_result['mothers_name'];
		$spouse_title='';
		$spouse='';
		$sector_type ='';
		//from function
		$sector_code = fetch_sector_list();
		//$sector_code =911000;

		$gender= $mis_result['sex'];
		$dath_of_brth = $mis_result['date_of_birth'];
		$place_of_birth= '';
		$country_of_birth='';
		 
		$tin_number = $mis_result['tin'];
		$parmanent_street = '';
		$parmanent_postal_code ='';
		$parmanent_district ='';
		$parmanent_country_code ='';
		$additional_street ='';
		$additional_postal_code ='';
		$additional_district ='';
		$additional_country_code ='';
		
		$id_issue_date = '';
		$id_issue_country_code = '';
		$phone_number = $mis_result['mobile_no'];

		
		
		
		// 40

		$subject_query = mysql_query("INSERT INTO `subject_info`(`record_type`, `fi_code`, `acc_date`, `production_date`, `code_link`, `branch_code`, `fi_subject_code`, `title`, `name`, `fathers_title`, `fathers_name`, `mothers_title`, `mothers_name`, `spouse_title`, `spouse`, `sector_type`, `sector_code`, `gender`, `dath_of_brth`, `place_of_birth`, `country_of_birth`, `nid_number`, `is_nid`, `tin_number`, `parmanent_street`, `parmanent_postal_code`, `parmanent_district`, `parmanent_country_code`, `additional_street`, `additional_postal_code`, `additional_district`, `additional_country_code`, `id_type`, `id_nr`, `id_issue_date`, `id_issue_country_code`, `phone_number`, `full_nid_number`, `reporting_date`, `status`) VALUES ('$record_type', '$fi_code', '$acc_date', '$production_date', '$code_link','$branch_code', '$fi_subject_code', '$title', '$name', '$fathers_title', '$fathers_name', '$mothers_title', '$mothers_name', '$spouse_title', '$spouse', '$sector_type', '$sector_code', '$gender', '$dath_of_brth', '$place_of_birth', '$country_of_birth', '$nid_13', '$is_nid', '$tin_number', '$parmanent_street', '$parmanent_postal_code', '$parmanent_district', '$parmanent_country_code', '$additional_street', '$additional_postal_code', '$additional_district', '$additional_country_code', '$id_type', '$id_nr', '$id_issue_date', '$id_issue_country_code', '$phone_number', '$full_nid_number', '$reporting_date', '0')");
		if($subject_query)
		{
			$suject_insert=  $suject_insert + 1;

			
		}




	



	}
	//uddate mis_table status
	mysql_query("UPDATE mis_table set status='1' where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' ");

	$cl_query= mysql_query("SELECT branch_name, client_id, card_no, card_status, contract,create_date, exp_date, caredit_limit_bdt , outstanding_bdt, total_outstanding_bdt , mp_due_bdt, reporting_date, deliquency from cl_table ct  where year(reporting_date)='$report_year' and month(reporting_date)='$report_month'");
	
	if(mysql_num_rows($cl_query) > 0)
	{
		while($cl_result = mysql_fetch_array($cl_query))
		{
			//fetch branch code
			$name = $cl_result['branch_name'];
			$branch = fetch_brach_code($name);
			$br_code = $branch['br_code'];

			//$br_code ='0004';

			$record_type ='D';
			$fi_code='077';
			//$branch_code='';
			$fi_subject_code = $cl_result['client_id'];
			$fi_contract_code = $cl_result['card_no'];

			//fetch_contract_type 
			$contract_type = fetch_contract_type();
			//$contract_type='CR';
			

			$fetch_phase_restlt = fetch_contract_phase($cl_result['card_status']);
			$contract_phase = $fetch_phase_restlt['value'];
			//$contract_status = $cl_result['contract'];

			if( $cl_result['contract'] == 'Ok' && $cl_result['deliquency'] == 'No Overdue' )
			{
				$contract_status = '';

			}else{
				$contract_status='';
			}

			$currency_code = fetch_currency_code();			
			//$currency_code = 'BDT';
			$currency_code_of_credit='';
			$starting_date_of_contract= $cl_result['create_date'];
			$request_date_of_the_contract = $cl_result['create_date'];
			$planned_end_date_of_the_contract = $cl_result['exp_date'];
			$actual_end_date_of_the_contract = '';

			$periodicity_of_payment = fetch_periodicity();
			//$periodicity_of_payment ='M';
			$method_of_payment = fetch_payment();
			//$method_of_payment = 'CAS';
			$monthly_instalment_amt = 'NO';
			$section_limit = $cl_result['caredit_limit_bdt'];
			$exp_date_of_next_installment ='';
			$remaining_amt = str_replace(',', '', $cl_result['outstanding_bdt']);
			$number_of_overdue_and_not_paid_installment = '';
			$overdue_amt= str_replace(',', '', $cl_result['total_outstanding_bdt']);
			$date_of_last_charge = '';
			$type_of_installment='';
			$amount_charged_in_the_month='';
			$flag_card_used_in_the_month='';
			$monthly_card_used_in_the_month='';
			$payment_delay_number='';
			$recovery_due = str_replace(',', '', $cl_result['mp_due_bdt']);
			$recovery_during_the_reporting_period ='';
			$date_of_classification='';
			$cumulative_recovery='';
			$date_of_law_suit ='';
			$no_of_times_rescheduled='';
			$economic_purpose_code='';
			$defaulter_flag=0;
			$total_disburse_amt = str_replace(',', '', $cl_result['caredit_limit_bdt']);
			$outstanding_amt =  str_replace(',', '', $cl_result['total_outstanding_bdt']);
			$flag_update = '';
			$reporting_date = $cl_result['reporting_date'];




			$contracts_query = mysql_query("INSERT INTO `contracts_info`(`record_type`, `fi_code`, `branch_code`, `fi_subject_code`, `fi_contract_code`, `contract_type`, `contract_phase`, `contract_status`, `currency_code`, `currency_code_of_credit`, `starting_date_of_contract`, `request_date_of_the_contract`, `planned_end_date_of_the_contract`, `actual_end_date_of_the_contract`, `periodicity_of_payment`, `method_of_payment`, `monthly_instalment_amt`, `section_limit`, `exp_date_of_next_installment`, `remaining_amt`, `number_of_overdue_and_not_paid_installment`, `overdue_amt`, `date_of_last_charge`, `type_of_installment`, `amount_charged_in_the_month`, `flag_card_used_in_the_month`, `monthly_card_used_in_the_month`, `payment_delay_number`, `recovery_due`, `recovery_during_the_reporting_period`, `cumulative_recovery`, `date_of_law_suit`, `date_of_classification`, `no_of_times_rescheduled`, `economic_purpose_code`, `defaulter_flag`, `total_disburse_amt`, `outstanding_amt`, `flag_update`, `reporting_date`, `status`) VALUES ('$record_type', '$fi_code', '$br_code', '$fi_subject_code', '$fi_contract_code', '$contract_type', '$contract_phase', '$contract_status', '$currency_code', '$currency_code_of_credit', '$starting_date_of_contract', '$request_date_of_the_contract', '$planned_end_date_of_the_contract', '$actual_end_date_of_the_contract', '$periodicity_of_payment', '$method_of_payment', '$monthly_instalment_amt', '$section_limit', '$exp_date_of_next_installment', '$remaining_amt', '$number_of_overdue_and_not_paid_installment', '$overdue_amt', '$date_of_last_charge', '$type_of_installment', '$amount_charged_in_the_month', '$flag_card_used_in_the_month', '$monthly_card_used_in_the_month', '$payment_delay_number', '$recovery_due', '$recovery_during_the_reporting_period', '$cumulative_recovery', '$date_of_law_suit', '$date_of_classification', '$no_of_times_rescheduled', '$economic_purpose_code', '$defaulter_flag', '$total_disburse_amt', '$outstanding_amt', '$flag_update', '$reporting_date', '0')");


			if($contracts_query)
			{
				$contracts_insert=  $contracts_insert + 1;
				
			}

		}

		mysql_query("UPDATE cl_table set status='1' where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' ");
	}


if($suject_insert && $contracts_insert)
{
	echo "CIB DATA SUCCESSFUL CREATE NOW 
	  	 YOU CAN GENERATE TXT FILE";
}	









}



	//end crate dat for cib

}






 ?>