<?php
session_start();
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
   

		if ( crypt($Password, $row['password']) === $row['password'] )
		{
			if ($row['hasLoggedIn'] == 1)
			{
		$_SESSION['userName'] = $userName;
			$_SESSION['pword'] = $Password;
			$_SESSION['userName'] = $userName;
				include 'checkpoint.html.php';
				
			}
			else 
			{
				$_SESSION['userName'] = $userName;
				$_SESSION['pword'] = $Password;

				include 'passChangeController.php';
			}
		
	   
		}
		
		elseif ( crypt($Password, $row['password']) != $row['password'] )
		{
	     print '<script type="text/javascript">'; 
       print 'alert("Sorry incorrect password")'; 
       print '</script>';  
	   $_POST = array();
	
	   include 'studentLoginController.php';
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
	include 'studentLogin.html.php';
}


	
	

			
?>