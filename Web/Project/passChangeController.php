<?php
include 'Access.php';
include 'connect.php';



try
{
    $pdo = new pdo("mysql:host=$host;dbname=$database", $userMS, $passwordMS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Connection to database failed';
  include 'error.html.php';
  exit();
}

try
{
  $selectString = "SELECT * from login";
    $result = $pdo->query($selectString);

	
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}


		

}

catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}

}


else{
	include 'student.html.php';
}



	
	

			
?>