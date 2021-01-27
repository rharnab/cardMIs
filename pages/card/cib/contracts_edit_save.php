<?php include("../database.php") ?>

<?php 
if(isset($_POST['id']))
{
	 $id = $_POST['id'];
	 $column_name = $_POST['column_name'];
	 $column_value = $_POST['column_value'];

	 $update = mysql_query("UPDATE contracts_info set $column_name = '$column_value' where id='$id'");
	 if($update)
	 {
	 	echo true;
	 }else{
	 	echo  "Error ! Failed To Update.";
	 }
	

}

 ?>