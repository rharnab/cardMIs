<?php include('../database.php'); ?>

<?php

$report_date = $_POST['cib_date'];
 $date_array = explode('-', $report_date);
 $report_year = $date_array[0];
 $report_month = $date_array[1]; 

$subject_dup = mysql_query("SELECT reporting_date from subject_info si where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$subject_result  = mysql_fetch_array($subject_dup);


$contracts_dup = mysql_query("SELECT reporting_date from contracts_info ci where year(reporting_date)='$report_year' and month(reporting_date)='$report_month' limit 1");
$contracts_result  = mysql_fetch_array($contracts_dup);

if($subject_result !='' &&  $contracts_result !='')
{
   echo "DO YOU WANT TO REGENARTE THIS CIB INFO";
}else{
	echo 0;
}


 ?>