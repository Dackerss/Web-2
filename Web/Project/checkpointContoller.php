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
	 
	 $selectString = "SELECT labname,isCheckpoint from lab Where isCheckpoint = 1 ";
    $resultLab = $pdo->query($selectString);

}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}

			
		
if (isset($_POST['checkpoint']))
{

	

$Password = strip_tags ($_POST['pword']);

try{
$selectString = "SELECT * FROM admin";
   $result = $pdo->prepare($selectString);
   $result->execute();
   
   $row=$result->fetch();
   $count=$result->rowCount();
   
	
		if ( crypt($Password, $row['password']) === $row['password'] )
		{
	   
			include 'toolController.php';
	   
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
     include 'checkpoint.html.php';
	}
	
	


			
?>