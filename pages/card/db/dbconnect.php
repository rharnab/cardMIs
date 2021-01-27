<?php 

	$dsn      = 'mysql:dbname=card;host=localhost';
    $user     = 'root';
    $password = '';
    
	try{
		$conn = new PDO($dsn,$user,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $error){

		print "Database not found!: ".$error->getMessage();
        die();
	}

?>