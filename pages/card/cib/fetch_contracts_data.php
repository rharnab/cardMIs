<?php include("../database.php") ?>


<?php

$report_date = date('Y-m', strtotime($_POST['cib_date']));
$accounting_date=date('Y-m-t', strtotime($report_date." -1 month"));
$acc_dt_array = explode("-", $accounting_date);
$acc_year= $acc_dt_array[0];
$acc_month= $acc_dt_array[1];



$sql =mysql_query("SELECT * from contracts_info ci where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month'");
$sl=1;
?>

    
    <table class="table table-bordered userlistTable" style="font-size: 12px">
              <thead style="background-color: #009688; color: white; text-transform: uppercase;">
                <tr>
                  <th>SL</th>
                  <th>RECORD TYPE</th>
                  <th>F.I. CODE</th>
                  <th>BRACNH CODE</th>
                  <th>FI. SUBJECT CODE</th>
                  <th>FI. CONTRACT CODE</th>
                  <th>CONTRACT TYPE</th>
                  <th>CONTRACT PHASE</th>
                  <th>CONTRACT STATUS</th>
                  <th>CURRENCY CODE</th>
                  <th>CURRENCY CODE OF CREDIT</th>
                  <th>STARTIG DATE OF THE CONTRACT</th>
                  <th>REQUEST DATE OF THE CONTRACT</th>
                  <th>PLANNED END DATE OF THE CONTRACT</th>
                  <th>ACTUAL END DATE OF THE CONTRACT</th>
                  <th>PAYMENT PERIODICITY</th>
                  <th>PAYMENT METHOD</th>
                  <th>MONTHLY INSTALMENT</th>
                  <th>SECTION LIMIT</th>
                  <th>EX. DATE OF NEXT INSTALLMENT</th>
                  <th>REMAINING AMOUNT</th>
                  <th>PAID INSTALMENTS</th>
                  <th>OVERDUE AMOUNT</th>
                  <th>LAST CHARGE DATE</th>
                  <th>INSTALLMENT TYPE</th>
                  <th>MONTHLY CHARGE AMT</th>
                  <th>MONTHLY FALG CARD USED</th>
                  <th>MONTHLY CARD USED</th>
                  <th>PAYMENT DELAY NUMBER</th>
                  <th>RECOVERY DUE</th>
                  <th>RECOVERY REPORTING PERIOD</th>
                  <th>COMULATIVE RECOVERY</th>
                  <th>LAW SUIT DATE</th>
                  <th>CLASSIFICATION DATE</th>
                  <th>RESCHEDULED NUMBER</th>
                  <th>ECONOMIC PURPOSE CODE</th>
                  <th>DEFAULTER FLAG</th>
                  <th>TOTAL DSBRS AMT </th>
                  <th>OUTSTANDING AMT</th>
                  <th>FLAG UPDATE</th>
                 
                </tr>
              </thead>
              <tbody >
              	<?php
              	$sl=1;
              	 while($data = mysql_fetch_array($sql))
					{
								

					 ?>
		              	<tr>
				        	  <td><?php echo $sl++ ?></td>
			                  <td  data-column_name="record_type" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable ><?php echo $data['record_type'] ?></td> 
			                  <td data-column_name="fi_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['fi_code'] ?></td>
			                  <td data-column_name="branch_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['branch_code'] ?></td>
			                  <td data-column_name="fi_subject_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['fi_subject_code'] ?></td>

			                  <td data-column_name="fi_contract_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['fi_contract_code'] ?></td>

			                  <td data-column_name="contract_type" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['contract_type'] ?></td>

			                  <td data-column_name="contract_phase" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['contract_phase'] ?></td>

			                  <td data-column_name="contract_status" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['contract_status'] ?></td>

			                  <td data-column_name="currency_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['currency_code'] ?></td>

			                  <td data-column_name="currency_code_of_credit" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['currency_code_of_credit'] ?></td>

			                  <td data-column_name="starting_date_of_contract" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['starting_date_of_contract'] ?></td>

			                  <td data-column_name="request_date_of_the_contract" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['request_date_of_the_contract'] ?></td>

			                  <td data-column_name="planned_end_date_of_the_contract" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['planned_end_date_of_the_contract'] ?></td>

			                  <td data-column_name="actual_end_date_of_the_contract" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['actual_end_date_of_the_contract'] ?></td>

			                  <td data-column_name="periodicity_of_payment" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['periodicity_of_payment'] ?></td>

	                          <td data-column_name="method_of_payment" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['method_of_payment'] ?></td> 

	                          <td data-column_name="monthly_instalment_amt" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['monthly_instalment_amt'] ?></td>

	                          <td data-column_name="section_limit" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['section_limit'] ?></td>

	                          <td data-column_name="exp_date_of_next_installment" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['exp_date_of_next_installment'] ?></td>

	                          <td data-column_name="remaining_amt" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['remaining_amt'] ?></td>

	                          <td data-column_name="number_of_overdue_and_not_paid_installment" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['number_of_overdue_and_not_paid_installment'] ?></td>

	                          <td data-column_name="overdue_amt" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['overdue_amt'] ?></td>

	                          <td data-column_name="date_of_last_charge" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['date_of_last_charge'] ?></td>

	                          <td data-column_name="type_of_installment" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['type_of_installment'] ?></td>

	                          <td data-column_name="amount_charged_in_the_month" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['amount_charged_in_the_month'] ?></td>

	                          <td data-column_name="flag_card_used_in_the_month" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['flag_card_used_in_the_month'] ?></td>

	                          <td data-column_name="monthly_card_used_in_the_month" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['monthly_card_used_in_the_month'] ?></td>

	                          <td data-column_name="payment_delay_number" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['payment_delay_number'] ?></td>

	                          <td data-column_name="recovery_due" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['recovery_due'] ?></td>

	                          <td data-column_name="recovery_during_the_reporting_period" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['recovery_during_the_reporting_period'] ?></td>

	                          <td data-column_name="cumulative_recovery" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['cumulative_recovery'] ?></td>

	                          <td data-column_name="date_of_law_suit" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['date_of_law_suit'] ?></td>

	                          <td data-column_name="date_of_classification" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['date_of_classification'] ?></td>

	                          <td data-column_name="no_of_times_rescheduled" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['no_of_times_rescheduled'] ?></td> 

	                          <td data-column_name="economic_purpose_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['economic_purpose_code'] ?></td>


	                          <td data-column_name="defaulter_flag" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['defaulter_flag'] ?></td>


	                          <td data-column_name="total_disburse_amt" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['total_disburse_amt'] ?></td>

	                          <td data-column_name="outstanding_amt" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['outstanding_amt'] ?></td>

	                         <td data-column_name="flag_update" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['flag_update'] ?></td>
					       
				       </tr>
		 			 <?php } ?>
                
                
               </tbody>
              </table>  

     <script type="text/javascript">
      $('.userlistTable').DataTable({

      });
   </script>
     <script src="../../../js/sweetalert.min.js"></script>


     <script>
     	$(document).ready(function() {

       $(document).on('keypress', '.inline_text_edit', function(e) {
            
             var keycode = (e.keyCode ? e.keyCode : e.which);
         if (keycode == '13') {
         	 var id = $(this).data("id");
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            inlineTableEdit(column_name, column_value, id);
            $(this).attr('contenteditable', false);
			$(this).focus();
			$(this).attr('contenteditable', true);
            e.stopPropagation();
            return false;
         }
           
            
        }); // end Inline Table Edit blur.
   
}); // end document ready



  	

function inlineTableEdit(c_name, c_value, c_id) {
    
    
        var column_name = c_name;
        var column_value = c_value;
        var id = c_id;



        if (column_value != '') {
            

				 swal({
				  title: "Are You Sure For Update ? ",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {

				  	//edit code url

				  	$.ajax({
                    url: "contracts_edit_save.php",
                    method: "POST",
                    data: {
                        column_name: column_name,
                        column_value: column_value,
                        id: id
                        
                    },
                    beforeSend: function() {
                     
                    },
                    success: function(response) {
                        if (response == true) {
                            
                            swal('Success ! Information Update Succefuly.');
                           
                            
                           
                            //location.reload();
                        } else {
                           
                            console.log(response);
                        }

                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
				    
				  } else {
				    
				  }
				});
        } else {
            swal('Field should not be empty !');
            location.reload();
        }
   
}


     </script>





