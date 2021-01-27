<?php 
ini_set('max_execution_time', '0'); // for infinite time of execution 
error_reporting(0);
include("../database.php");
/*echo $_FILES['input_file']['name'];
echo print_r($_POST);*/
$count=0;

if(isset($_FILES['input_file']))
{
   $file_name = $_FILES['input_file']['name'];
   $currentStamp = date('YmdHis');
   $today = date('Y-m-d');
   //$entry_by = '10000';
   $entry_by = $_SESSION['login_id'];
   $tag = $_POST['tag'];
   $report_date = date('Y-m-d', strtotime($_POST['report_date']));

   //this month array
   $today_dt = date('Y-m', strtotime($today));
 

   //reporting month array
   $report_dt = date('Y-m', strtotime($report_date));

   //last month
   $last_month = date('Y-m', strtotime($today_dt." -2 month"));
  

   //check previos month
  if(($last_month < $report_dt) && ($report_dt < $today_dt))
  {

  	 $report_date_array = explode('-', $report_dt);
   	 $report_year =  $report_date_array[0];
   	 $report_month =  $report_date_array[1];

   	 mysql_query("DELETE  from   mis_table where month (reporting_date)='$report_month' and year (reporting_date)='$report_year' ");


  	//save subject data
  	$du_sql = mysql_query("SELECT file_name from mis_table where file_name = '$file_name' ");
$dup_result = mysql_fetch_array($du_sql);

if($dup_result['file_name'] === $file_name)
{
  

echo " Sorry this is duplicate file ";

}else{


  $ext = explode(".", $file_name);
  if($ext[1] =='TXT' or $ext[1] =='txt')
  {

  		if(!file_exists('subjects'))
  		{
  			mkdir('subjects');
  		}


  		$path = "subjects/".$currentStamp.$file_name;

  		if(move_uploaded_file($_FILES['input_file']['tmp_name'], $path))
  		{
  			
  		}else{
  			echo "Sorry file not not upload or Wrong file ";
  		}

          //read text file
          //$fp = fopen($_FILES['input_file']['tmp_name'], 'r');
          $fp = fopen($path, 'r');

          //$array = explode("\n", fread($fp, filesize($_FILES['input_file']['tmp_name'])));
          $array = explode("\n", fread($fp, filesize($path)));
				
				
				$title=explode("|",  $array[9]);
				$data=array();
				
				$total_row =  count($array);
				$insert_success = 0;
				for($j =12; $j < $total_row; $j++)
				{
					$exp_data = explode("|", $array[$j]);

					if($exp_data[8] && $exp_data[2] && $exp_data[33] !='')
					{
						

						

						 list($null ,$personal_code, $client_id, $title, $customer_name, $date_of_birth, $sex, $designation, $mothers_name, $fathers_name, $resident_address, $resident_city, $resident_region, $resident_country, $contract_address, $contract_city, $contract_region, $contract_country, $register_address, $register_city, $register_region, $register_country, $telephone, $fax, $mobile_no, $email, $referenced_by, $passport_no, $national_id, $tin, $tax_zone, $tax_circle, $sales_officer_name, $card_no, $card_product_name, $create_date, $exp_date, $card_status, $contract, $account_no_bdt, $limit_amt_bd, $account_no_usd, $limit_amt_usd ) = $exp_data;



						 $personal_code= mysql_real_escape_string(trim($personal_code));
						 $client_id =mysql_real_escape_string(trim($client_id)); 
						 $title= mysql_real_escape_string(trim($title));
						 $customer_name=mysql_real_escape_string(trim($customer_name));
						 $date_of_birth=mysql_real_escape_string(trim($date_of_birth));
						 $sex=mysql_real_escape_string(trim($sex));
						 $designation=mysql_real_escape_string(trim($designation));
						 $mothers_name=mysql_real_escape_string(trim($mothers_name));
						 $fathers_name=mysql_real_escape_string(trim($fathers_name));
						 $resident_address=mysql_real_escape_string(trim($resident_address));
						 $resident_city=mysql_real_escape_string(trim($resident_city));
						 $resident_region=mysql_real_escape_string(trim($resident_region));
						 $resident_country=mysql_real_escape_string(trim($resident_country));
						 $contract_address=mysql_real_escape_string(trim($contract_address));
						 $contract_city=mysql_real_escape_string(trim($contract_city));
						 $contract_region=mysql_real_escape_string(trim($contract_region));
						 $contract_country=mysql_real_escape_string(trim($contract_country));
						 $register_address=mysql_real_escape_string($register_address);
						 $register_city=mysql_real_escape_string(trim($register_city));
						 $register_region=mysql_real_escape_string(trim($register_region));
						 $register_country=mysql_real_escape_string(trim($register_country));
						 $telephone= mysql_real_escape_string(trim(str_replace("(", "", str_replace(")", "", substr($telephone, 4))))); 
						 $fax=mysql_real_escape_string(trim(str_replace("(", "", str_replace(")", "", substr($fax, 4)))));
						 $mobile_no=mysql_real_escape_string(trim(str_replace("(", "", str_replace(")", "", substr($mobile_no, 4)))));
						 $email=mysql_real_escape_string(trim($email));
						 $referenced_by=mysql_real_escape_string(trim($referenced_by));
						 $passport_no=mysql_real_escape_string(trim($passport_no));
						 $national_id=mysql_real_escape_string(trim($national_id));
						 $tin=mysql_real_escape_string(trim($tin));
						 $tax_zone=mysql_real_escape_string(trim($tax_zone));
						 $tax_circle=mysql_real_escape_string(trim($tax_circle));
						 $sales_officer_name = mysql_real_escape_string(trim($sales_officer_name));
						 $card_no=mysql_real_escape_string(trim($card_no));
						 $card_product_name =mysql_real_escape_string(trim($card_product_name));
						 $create_date= mysql_real_escape_string(trim($create_date));
						 $exp_date = mysql_real_escape_string(trim($exp_date));
						 $card_status= mysql_real_escape_string(trim($card_status));
						 $contract= mysql_real_escape_string(trim($contract));
						 $account_no_bdt= mysql_real_escape_string(trim($account_no_bdt));
						 $limit_amt_bd= mysql_real_escape_string(trim(str_replace(",", "", number_format($limit_amt_bd))));
						 $account_no_usd =mysql_real_escape_string(trim($account_no_usd));
						 $limit_amt_usd= mysql_real_escape_string(trim(str_replace(',', '', number_format($limit_amt_usd))));

						 $insert = mysql_query("INSERT INTO `mis_table`(`personal_code`, `client_id`, `title`, `customer_name`, `date_of_birth`, `sex`, `designation`, `mothers_name`, `fathers_name`, `resident_address`, `resident_city`, `resident_region`, `resident_country`, `contract_address`, `contract_city`, `contract_region`, `contract_country`, `register_address`, `register_city`, `register_region`, `register_country`, `telephone`, `fax`, `mobile_no`, `email`, `referenced_by`, `passport_no`, `national_id`, `tin`, `tax_zone`, `tax_circle`, `sales_officer_name`, `card_no`, `card_product_name`, `create_date`, `exp_date`, `card_status`, `contract`, `account_no_bdt`, `limit_amt_bd`, `account_no_usd`, `limit_amt_usd`, `file_name`, `entry_date`, `entry_by`, `tag`, `reporting_date`,`status`) VALUES ('$personal_code', '$client_id', '$title', '$customer_name', '$date_of_birth', '$sex', '$designation', '$mothers_name', '$fathers_name', '$resident_address', '$resident_city', '$resident_region', '$resident_country', '$contract_address', '$contract_city', '$contract_region', '$contract_country', '$register_address', '$register_city', '$register_region', '$register_country', '$telephone', '$fax', '$mobile_no', '$email', '$referenced_by', '$passport_no', '$national_id', '$tin', '$tax_zone', '$tax_circle', '$sales_officer_name', '$card_no', '$card_product_name', '$create_date', '$exp_date', '$card_status', '$contract', '$account_no_bdt', '$limit_amt_bd', '$account_no_usd', '$limit_amt_usd', '$file_name', '$today', '$entry_by', '$tag', '$report_date', '0' )");


						 if($insert)
					       {
					       		$insert_success +=1;
					       }

						

					}

					
				}
				
          

                //end read text file

           

        }else{
          echo "File must be txt file";
        }

         print "$insert_success Data imported ";
  

	}


  }else{
  	
  		echo "PLEASE SELECT PREVIOUS MONTH FOR REPORTING DATE";
  }

  

  
   }


 ?>