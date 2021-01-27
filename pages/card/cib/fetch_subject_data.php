<?php include("../database.php") ?>


<?php

$report_date = date('Y-m', strtotime($_POST['cib_date']));
$accounting_date=date('Y-m-t', strtotime($report_date." -1 month"));
$acc_dt_array = explode("-", $accounting_date);
$acc_year= $acc_dt_array[0];
$acc_month= $acc_dt_array[1];



$sql =mysql_query("SELECT * from subject_info si where year (reporting_date) ='$acc_year' and month (reporting_date)='$acc_month'");
$sl=1;
?>

    
    <table class="table table-bordered userlistTable" style="font-size: 12px">
              <thead style="background-color: #009688; color: white; text-transform: uppercase;">
                <tr>
                  <th>sl</th>
                  <th>RECORD TYPE</th>
                  <th>F.I CODE</th>
                  <th>BRANCH CODE</th>
                  <th>F.I SUBJECT CODE</th>
                  <th>TITLE</th>
                  <th>NAME</th>
                  <th>FITHER'S TITLE</th>
                  <th>FITHER'S NAME</th>
                  <th>MOTHER'S TITLE</th>
                  <th>MOTHER'S NAME</th>
                  <th>SPOUSE'S TITLE</th>
                  <th>SPOUSE'S NAME</th>
                  <th>SECTOR TYPE</th>
                  <th>SECTOR CODE</th>
                  <th>GENDER</th>
                  <th>BIRTH DATH</th>
                  <th>PLACE OF BIRTH</th>
                  <th>COUNTRY OF BIRTH</th>
                  <th>NID NUMBER</th>
                  <th>IS NID</th>
                  <th>TIN</th>
                  <th>PAR. STREET</th>
                  <th>PAR. POSTAL CODE</th>
                  <th>PAR. DISTRICT</th>
                  <th>PAR. COUNTRY CODE</th>
                  <th>ADD. STREET</th>
                  <th>ADD. POSTAL CODE</th>
                  <th>ADD. DISTRICT</th>
                  <th>ADD. COUNTRY CODE</th>
                  <th>ID TYPE</th>
                  <th>ID NR</th>
                  <th>ID ISSUE DATE</th>
                   <th>ID ISSUE COUNTRY CODE</th>
                  <th>PHONE NUM.</th>
                  <th>FULL NID</th>
                 
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
                        <td data-column_name="title" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['title'] ?></td>
                        <td data-column_name="name" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['name'] ?></td>
                        <td data-column_name="fathers_title" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['fathers_title'] ?></td>
                        <td data-column_name="fathers_name" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['fathers_name'] ?></td>
                        <td data-column_name="mothers_title" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['mothers_title'] ?></td>
                        <td data-column_name="mothers_name" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['mothers_name'] ?></td>
                        <td data-column_name="spouse_title" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['spouse_title'] ?></td>
                        <td data-column_name="spouse" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['spouse'] ?></td>
                        <td data-column_name="sector_type" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['sector_type'] ?></td>
                        <td data-column_name="sector_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['sector_code'] ?></td>
                        <td data-column_name="gender" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['gender'] ?></td>

                            <td data-column_name="dath_of_brth" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['dath_of_brth'] ?></td> 
                            <td data-column_name="place_of_birth" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['place_of_birth'] ?></td>
                            <td data-column_name="country_of_birth" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['country_of_birth'] ?></td>
                            <td data-column_name="nid_number" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['nid_number'] ?></td>
                            <td data-column_name="is_nid" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['is_nid'] ?></td>
                            <td data-column_name="tin_number" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['tin_number'] ?></td>
                            <td data-column_name="parmanent_street" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['parmanent_street'] ?></td>
                            <td data-column_name="parmanent_postal_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['parmanent_postal_code'] ?></td>
                            <td data-column_name="parmanent_district" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['parmanent_district'] ?></td>
                            <td data-column_name="parmanent_country_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['parmanent_country_code'] ?></td>
                            <td data-column_name="additional_street" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['additional_street'] ?></td>
                            <td data-column_name="additional_postal_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['additional_postal_code'] ?></td>
                            <td data-column_name="additional_district" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['additional_district'] ?></td>
                            <td data-column_name="additional_country_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['additional_country_code'] ?></td>
                            <td data-column_name="id_type" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['id_type'] ?></td>
                            <td data-column_name="id_nr" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['id_nr'] ?></td>
                            <td data-column_name="id_issue_date" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['id_issue_date'] ?></td>
                            <td data-column_name="id_issue_country_code" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['id_issue_country_code'] ?></td>
                            <td data-column_name="phone_number" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['phone_number'] ?></td> 
                            <td data-column_name="full_nid_number" data-id="<?php echo $data['id'] ?>" class="inline_text_edit" contenteditable><?php echo $data['full_nid_number'] ?></td>
                 
               </tr>
           <?php } ?>
                
                
               </tbody>
              </table>  

     <script type="text/javascript">$('.userlistTable').DataTable();</script>
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

                  $.ajax({
                    url: "subject_edit_save.php",
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
   
} // end inlineTableEdit() method.
     </script>





