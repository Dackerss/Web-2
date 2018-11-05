<?php

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
  $selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);

	
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}


		
if (isset($_POST['confirm']))
{

	
$userName = ($_POST['student']);
$Password = strip_tags ($_POST['pword']);

try{

$selectString = "SELECT * FROM students WHERE (userName=:userName)";
   $result = $pdo->prepare($selectString);
   $result->bindvalue(':userName',$userName);
   $result->execute();
   
   $row=$result->fetch();
   $count=$result->rowCount();
   
	if($count==0)
		{
	   
			$result= 'Not a user';
	   
		}
		elseif ( crypt($Password, $row['password']) === $row['password'] )
		{
			if ($row['hasLoggedIn'] == 1)
			{
				include 'checkpoint.html.php';
			}
			else 
			{
				include 'passChangeController.php';
			}
		
	   
		}
		
		elseif ( crypt($Password, $row['password']) != $row['password'] )
		{
	     print '<script type="text/javascript">'; 
       print 'alert("Sorry incorrect password")'; 
       print '</script>';  
	   include 'checkpoint.html.php';
		}
		
		
}
catch (PDOException $e)
{
	
}
}

else{
	include 'studentLogin.html.php';
}


	
	

			
?>