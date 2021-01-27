<?php 
ini_set('max_execution_time', '0'); // for infinite time of execution 
include("../database.php");
/*echo $_FILES['input_file']['name'];
echo print_r($_POST);*/
$count=0;

if(isset($_FILES['input_file']))
{
   $file_name = $_FILES['input_file']['name'];

$du_sql = mysql_query("SELECT file_name from debit_charge_deduction where file_name='$file_name' ");
$dup_result = mysql_fetch_array($du_sql);

if($dup_result['file_name'] === $file_name)
{
  

echo " Sorry this is duplicate file ";

}else{


  $ext = explode(".", $file_name);
  if($ext[1] =='TXT' or $ext[1] =='txt')
  {

          //read text file
          $fp = fopen($_FILES['input_file']['tmp_name'],'r'); 
          // Add each line to an array
          if ($fp) {
             $array = explode("\n", fread($fp, filesize($_FILES['input_file']['tmp_name'])));
          }
          //print "<pre>";
          // print_r($array);
          $data=array();
          foreach ($array as $key => $value) {
            if($key>12){
              $a = substr($value, 0, 46);
               $postingDt=substr($a, 0, 10);
               $cardHolderName=trim(substr($a, 10));
              $b =substr($value, 46);
              $e = substr($b, 0, 33);
              $f=explode("    ", $e);
              $x=substr($b,33);
              $y=substr($x, 0,17);
              $cardStatus=trim($y);
              $z=substr($x, 17);
              $c=explode('    ',$b);
              if(!empty($f[1]))
              {
                $acNo=$f[1];
                $cardNo=$f[0];
               $d=explode(' ',$z);
              //print_r($d);
              //$cardStatus=$d[0];
              $createdDt=$d[0];
              $expireDt=$d[1];
              $cardFee=trim($d[12]);
              $vatAmt=trim($d[20]);
              $totalCardFee=trim($d[30]);
              $cardFeeRevAmt=trim($d[42]);
              $vatRevAmt=trim($d[51]);
              $totalCardFeeRevAmt=trim($d[63]);
              $dt=date("Y-m-d");
              $str=$postingDt.",".$cardHolderName.",".$cardNo.",".$acNo.",".$cardStatus.",".$createdDt.",".$expireDt.",".$cardFee.",".$vatAmt.",".$totalCardFee.",".$totalCardFee.",".$cardFeeRevAmt.",".$vatRevAmt.",".$totalCardFeeRevAmt;
              //print "$str <br>";
              $postingDt = date('Y-m-d', strtotime($postingDt));
              $c_date = explode('/', $createdDt);
              $createdDt = $c_date[2]."-".$c_date[1]."-".$c_date[0];
              $e_date = explode('/', $expireDt);
              $expireDt = $e_date[2]."-".$e_date[1]."-".$e_date[0];

              $q=mysql_query("INSERT INTO debit_charge_deduction (posting_dt, card_holder_name, card_no_file, account_no_file, card_status, created_dt, expiry_dt, card_fee, vat, total_card_fee, card_fee_rev, vat_rev, total_card_fee_rev, ac_from_flora, ac_from_tebonus, status, entry_dt, process_dt, remarks, file_name, due_fee_amt) VALUES ('$postingDt','$cardHolderName','$cardNo','$acNo','$cardStatus','$createdDt','$expireDt','$cardFee','$vatAmt','$totalCardFee','$cardFeeRevAmt','$vatRevAmt','$totalCardFeeRevAmt','','','0','$dt','','File Upload', '$file_name', '$totalCardFee')");

              if($q)
                $count++;
              }
            }
          }

                //end read text file

           

        }else{
          echo "File must be txt file";
        }

         print "$count card charge  Created ";
  

}




  
   }

    

  






 ?>