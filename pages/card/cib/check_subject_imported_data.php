<?php include("../database.php"); ?>
<?php 

	//check duplicate date
   if(isset($_POST['report_date']))
   {
   	 $report_date = date('Y-m-d', strtotime($_POST['report_date']));
   	 $report_date_array = explode('-', $report_date);
   	 $report_year =  $report_date_array[0];
   	 $report_month =  $report_date_array[1];

   	 $duplicate_data_sql = mysql_query("SELECT reporting_date from mis_table where month (reporting_date)='$report_month' and year (reporting_date)='$report_year' ");
     $duplicate_data_result = mysql_fetch_array($duplicate_data_sql);
     if($duplicate_data_result =='')
     {
     	echo 0;	
     }else{
     	echo "THIS MONTH DATA ALREADY IMPORTED !!
     		  DO YOU want  DELETE OLD DATA  ?? ";
     }

   }

 ?>