<?php
Session_start();
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


if (isset($_POST['userName']))
{
	$userName = strip_tags($_POST['userName']);
	
}

else if (isset($_SESSION['userName']))
{
	$userName = $_SESSION['userName'];
}


if (isset($_POST['pword']))
{
	$Password = strip_tags($_POST['pword']);
	
}

else if (isset($_SESSION['pword']))
{
	$Password = $_SESSION['pword'];
}

if(!isset($userName))
{
	$selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);
 include'studentLogin.html.php';
 
 exit();


}

if (isset($_POST['change']))
{

  
	$oldPassword = strip_tags ($_POST['oldpword']);
	$newPassword = strip_tags ($_POST['newpword']);
	$userName = ($_POST['userName']);
	$selectString = "SELECT * FROM students WHERE (userName=:userName)";
   $result = $pdo->prepare($selectString);
   $result->bindvalue(':userName',$userName);
   $result->execute();
   
   $row=$result->fetch();
   $count=$result->rowCount();
   
	if($count==0)
		{
	   
			$result= 'Not a user';
			echo ("apple");
			echo $oldPassword;
			print_r($_POST);
			include 'landing.html.php';
	   
		}
		elseif ( crypt($oldPassword, $row['password']) === $row['password'] )
		{
			$selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);
		
			$updateQuery ="UPDATE students SET password = :password WHERE students.userName like '$userName'"; 
			$stmt =$pdo->prepare($updateQuery);
			$stmt->bindParam(':password',$newPassword);
		
			
				
			
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($newPassword, $salt);
			$newPassword = $hash;
			$stmt->execute();
				$updateQuery2 ="UPDATE students SET hasLoggedIn = '1' WHERE students.userName like '$userName'"; 
			$stmt =$pdo->prepare($updateQuery2);
			$stmt->execute();
			include 'studentLogin.html.php';
			exit();
		
			
		}
}
	

//$Password = strip_tags ($_POST['pword']);

if(isset($userName))
{
$selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);
	
$selectString = "SELECT * FROM students WHERE (userName=:userName)";
   $result = $pdo->prepare($selectString);
   $result->bindvalue(':userName',$userName);
   $result->execute();
   
   $row=$result->fetch();
   $count=$result->rowCount();
   if ($count>0)
   {

		if ( crypt($Password, $row['password']) === $row['password'] )
		{
			if ($row['hasLoggedIn'] == 1)
			{
			
			
			}
			else 
			{
				
			
			include 'passChange.html.php';
			exit();
			
			}
		
	   
		}
		elseif (isset($_POST['apple']))
		{
			
		}
   	
		elseif ( crypt($Password, $row['password']) != $row['password'] )
		{
			
	   print '<script type="text/javascript">'; 
       print 'alert("Sorry incorrect password")'; 
       print '</script>';  
	   print_r($_POST);
	   include 'studentLogin.html.php';
	   exit();
		}
	   
	   
	
	  
		}

}

	
?>