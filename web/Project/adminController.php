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

if(!isset($_POST['userName']))
{
	
 include'adminLogin.html.php';

 exit();


}

if(isset($_POST['userName']))
{
	
	$adminUser = strip_tags ($_POST['userName']);
	$adminPassword = strip_tags ($_POST['pword']);

	
	$selectString = "SELECT * FROM admin WHERE (userName=:userName)";
   $result = $pdo->prepare($selectString);
   $result->bindvalue(':userName',$adminUser);
   $result->execute();
   
   $row=$result->fetch();
   $count=$result->rowCount();
   if ($count==0)
   {
		print '<script type="text/javascript">'; 
		print 'alert("Sorry incorrect user ")'; 
		print '</script>';
		include'landing.html.php';	  
		
		exit();		
	   
   }
   if ($count>0)
   {

		if ( crypt($adminPassword, $row['adminPassword']) === $row['adminPassword'] )
		{
		
	  
		}
	
   	
		elseif ( crypt($adminPassword, $row['password']) != $row['password'] )
		{
			
	   print '<script type="text/javascript">'; 
       print 'alert("Sorry incorrect password")'; 
       print '</script>';  
	  
	    $_POST = array();
	   
	   include'adminLogin.html.php';	
	  
	   exit();
	

}
}
}}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}

if(isset($_POST['reset']))
{
	$student = strip_tags ($_POST['student']);
	
	
	$selectString = "select studentNumber FROM students where userName = '$student'";
	$studentID = $pdo->prepare($selectString);
	$studentID->execute();
	foreach($studentID as $row)
	{
		$id = $row['studentNumber'];
	}
	
	$updateQuery ="UPDATE students SET password = :password WHERE students.userName like '$student'"; 
			$stmt =$pdo->prepare($updateQuery);
			$stmt->bindParam(':password',$id);
			
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($id, $salt);
			$id = $hash;
			$stmt->execute();
				$updateQuery2 ="UPDATE students SET hasLoggedIn = '0' WHERE students.userName like '$student'"; 
			$stmt =$pdo->prepare($updateQuery2);
			$stmt->execute();
			
			   print '<script type="text/javascript">'; 
       print 'alert("Password reset for '. $student .' ")'; 
       print '</script>';  
	
	
}
		$selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);


		
		


			
  
     include 'admin.html.php';
	
	


			
?>