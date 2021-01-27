<?php	
//if(!($mylink=mysql_connect("localhost","root","RtgsRoot123")))
	if(!($mylink=mysql_connect("localhost","root","")))
 {
	print "<h3>couldnot connect database</h3>\n";
	exit;
	}	
	@mysql_select_db("card", $mylink ) or die ("unable to locate database");
?>