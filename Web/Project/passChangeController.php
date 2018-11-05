<?php
session_start();
include 'connect.php';

$userName = $_SESSION['userName'];

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


		
if (isset($_POST['a']))
{
try
{
	$userName = $_SESSION['userName'];
	$oldPassword = strip_tags ($_POST['oldpword']);
	$newPassword = strip_tags ($_POST['newpword']);
	
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
		elseif ( crypt($oldPassword, $row['password']) === $row['password'] )
		{
			$updateQuery ="UPDATE students SET password = :password WHERE userName = :userName"; 
			$stmt =$pdo->prepare($updateQuery);
			$stmt->bindParam(':password',$newPassword);
			$stmt->bindParam(':adminPassword',$adminPassword);	
			
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($newPassword, $salt);
			$newPassword = $hash;
			$stmt->execute();
			include 'landing.html.php';
			
		}
		
			else 
			{
				$_POST = array();
				include 'passChange.html.php';
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
	include 'passChange.html.php';
}



	
	

			
?>