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


	if (isset($_POST['submit']))	
		
		{
			print_r($_POST);
			$userName =$_POST['userName'];
			$labID =$_POST['labID'];
			$selectString = "SELECT * from students where students.userName='$userName'";
		    $id = $pdo->prepare($selectString);
			$id->execute();
		
			$count=$id->rowCount();
			if($count>0)
			{
			foreach($id as $row)
				{
					
				  $studentID = $row['studentID'];
					
				}
			$easy = $_POST['easy/hard'];
			$boring = $_POST['boring/interesting'];
			$new = $_POST['new/familiar'];
			$problem = $_POST['problem/clear'];
			$notImproved = $_POST['notImproved/improved'];
			$frustrated = $_POST['frustrated/triumphant'];
			
			if($easy != 0 && $boring != 0 )
			{
				echo $easy;
				$insertstring = "insert into data (toolID, studentID, labID, xValue, yValue) VALUE (1, $studentID, $labID, '$easy', '$boring' )";
				$insert = $pdo->prepare($insertstring);
				$insert->execute();
				
			} 

		
				if($new != 0 && $problem != 0)
			{
				echo $new;
				$insertstring = "insert into data (toolID, studentID, labID, xValue, yValue) VALUE (2, $studentID, $labID, $new, $problem )";
				$insert = $pdo->prepare($insertstring);
				$insert->execute();
				
			}
				
				if($frustrated != 0 && $notImproved != 0)
			{
				echo $frustrated;
				$insertstring = "insert into data (toolID, studentID, labID, xValue, yValue) VALUE (3, $studentID, $labID, $frustrated, $notImproved )";
				$insert = $pdo->prepare($insertstring);
				$insert->execute();
				
			}
			
				$insertstring = "insert into completion (studentID, labID) VALUE ($studentID, $labID)";
				$insert = $pdo->prepare($insertstring);
				$insert->execute();
			
				
		print '<script type="text/javascript">'; 
       print 'alert("Thank you for your feed back")'; 
       print '</script>';  
			include 'landing.html.php';
			exit();
			}	
		}

if (isset($_POST['userName']))
{
	$userName = strip_tags($_POST['userName']);
	//$_SESSION['userName'] = $userName;
}

else if (isset($_SESSION['userName']))
{
	$userName = $_SESSION['userName'];
}


if (isset($_POST['pword']))
{
	$Password = strip_tags($_POST['pword']);
	//$_SESSION['pword'] = $Password;
}

else if (isset($_SESSION['pword']))
{
	$Password = $_SESSION['pword'];
}

if(!isset($userName))
{
	$selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);
	
	$selectString = "SELECT labname,isCheckpoint from lab Where isCheckpoint = 1 ";
    $resultLab = $pdo->query($selectString);
 include'checkpoint.html.php';
 
 exit();


}

if(isset($userName))
{
	

$labName = $_POST['labname'];
	$labPassword=0;
   $selectString = "SELECT * FROM completion JOIN lab on completion.labID = lab.labID JOIN students on completion.studentID = students.studentID where students.userName = '$userName' and  lab.labName = '$labName'";
   $done = $pdo->prepare($selectString);
   $done->execute();
   $row=$done->fetch();
   $count=$done->rowCount();
    
   if($count>0)
   {
	    $_POST = array();
		print '<script type="text/javascript">'; 
       print 'alert("You have already been marked off for this lab")'; 
       print '</script>';  
	   include 'landing.html.php';
	   exit();
	   
   }
   else
   {
   $selectString = "SELECT labID FROM lab WHERE labName='$labName'";
   $stuff = $pdo->prepare($selectString);
   $stuff->execute();
   $row=$stuff->fetch();
   $count=$stuff->rowCount();

  if ($count>0)
   {
        $labPassword = $row['labID'];
		$labID = $labPassword;
		$labPassword = $labPassword*5;
       
		if ($Password == $labPassword)
		{
			
			
		}
		
		else
		{
			
			print '<script type="text/javascript">'; 
       print 'alert("Incorrect Password")'; 
       print '</script>'; 
		 include 'landing.html.php';
			exit();
		}
   }
	
	  
	
		
		}
		
}

   	
	



?>