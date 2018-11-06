<?php
Session_start();
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
	
 include'studentLogin.html.php';


}
	

//$Password = strip_tags ($_POST['pword']);



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
	
			$_SESSION['userName'] = $userName;
			$_SESSION['pword'] = $pword;
			}
			else 
			{
				
			include'passChange.html.php';
			
			}
		
	   
		}
   }	
		elseif ( crypt($Password, $row['password']) != $row['password'] )
		{
	     print '<script type="text/javascript">'; 
       print 'alert("Sorry incorrect password")'; 
       print '</script>';  
	   $_POST = array();
	
	  
		}

		
	
?>