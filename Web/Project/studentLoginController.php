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
  $selectString = "SELECT userName from students";
    $resultUserName = $pdo->query($selectString);

	$selectString = "SELECT labname,isCheckpoint from lab Where isCheckpoint = 1 ";
    $resultLab = $pdo->query($selectString);
	
	$selectString = "SELECT studentID from students where userName = '$userName'";
	$resultid = $pdo->query($selectString);
	$labName = "meh";
	$a="meh";
	
	if(isset($_POST['apple']))
	{
		$tool1X = 0;
		$tool1Y = 0;
		$tool2X = 0;
		$tool2Y = 0;
		$tool3X = 0;
		$tool3Y = 0;
		$tool1Total = 0;
		$tool2Total = 0;
		$tool3Total = 0;
		$selectString = "SELECT studentID from students where userName = '$userName'";
		$resultid = $pdo->query($selectString);
		$labName = $_POST['dynamic_data'];
		
		$selectString = "SELECT * from data JOIN lab on data.labID = lab.labID Where lab.labName = '$labName'";
		$toolData = $pdo->prepare($selectString);
		$toolData->execute();
		//$row=$toolData->fetch();
		$count=$toolData->rowCount();
		if ($count>0)
			{
				foreach($toolData as $row)
				{
				if($row['toolID'] == 1)
				{
					$tool1X = $tool1X + $row['xValue'];   
					$tool1Y = $tool1Y + $row['yValue'];
					$tool1Total = $tool1Total + 1;
					
				}
				
				elseif($row['toolID'] == 2)
				{
					$tool2X = $tool1X + $row['xValue'];   
					$tool2Y = $tool1Y + $row['yValue'];
					$tool2Total = $tool2Total + 1;
				}
				
				elseif($row['toolID'] == 3)
				{
					$tool3X = $tool1X + $row['xValue'];   
					$tool3Y = $tool1Y + $row['yValue'];
					$tool3Total = $tool3Total + 1;
				}
				}
				
				
			
				
			}
		$tool1xAve = $tool1X / $tool1Total;
		$tool1yAve = $tool1Y/  $tool1Total;
		$tool2xAve = $tool2X / $tool2Total;
		$tool2yAve = $tool2Y/  $tool2Total;
		$tool3xAve = $tool3X / $tool3Total;
		$tool3yAve = $tool3Y/  $tool3Total;
		
		
			$tool1xSelf = 0;
			$tool1ySelf = 0;
			$tool2xSelf = 0;
			$tool2ySelf = 0;
			$tool3xSelf = 0;
			$tool3ySelf = 0;
	
	$selectString = "SELECT * from data JOIN lab on  data.labID = lab.labID  JOIN students on data.studentID = students.studentID where students.userName = '$userName' and  lab.labName = '$labName'";
		$toolDataSelf = $pdo->prepare($selectString);
		$toolDataSelf->execute();
	//	$row=$toolDataSelf->fetch();
		$count=$toolDataSelf->rowCount();
	
		if ($count>0)
			{
				
				foreach($toolDataSelf as $row)
				{
				   
					
				
				if($row['toolID'] == 2)
				{
					
					$tool1xSelf = $row['xValue'];   
					$tool1ySelf = $row['yValue'];
					
					
				}
				elseif($row['toolID'] == 1)
				{
					$tool2xSelf = $row['xValue'];   
					$tool2ySelf = $row['yValue'];
					
					
				}
				
				
				elseif($row['toolID'] == 3)
				{
				
					$tool3xSelf = $row['xValue'];   
					$tool3ySelf = $row['yValue'];
				}
				}
				
				
				
			
				
			} 
	
		$selectString = "SELECT * from completion JOIN lab on  completion.labID = lab.labID  JOIN students on completion.studentID = students.studentID where students.userName = '$userName' and  lab.labName = '$labName'";
		//$selectString = "SELECT completionID from completion where studentID = '$studentID' and labID = 2"
	$result2 = $pdo->prepare($selectString);
	$result2->execute();
	$row=$result2->fetch();
	$count=$result2->rowCount();
   if ($count>0)
   {
		$a = "yes";
	}
	else
	{
		
		$a ="no";
	}
	
	$userTotal=0;
		$selectString = "SELECT * from completion JOIN students on completion.studentID = students.studentID where students.userName = '$userName' ";
		//$selectString = "SELECT completionID from completion where studentID = '$studentID' and labID = 2"
	$userAverage = $pdo->prepare($selectString);
	$userAverage->execute();
	//$row=$userAverage->fetch();
	$count=$userAverage->rowCount();
			foreach($userAverage as $row)
				{
				  
				if ($count>0)
				{
					$userTotal = $userTotal + 1;
				}

	
				}
	
	
	
	
	$classSize=0;
	$selectString = "SELECT * from students ";
		//$selectString = "SELECT completionID from completion where studentID = '$studentID' and labID = 2"
	$class = $pdo->prepare($selectString);
	$class->execute();
	//$row=$userAverage->fetch();
	$count=$class->rowCount();
			foreach($class as $row)
				{
				  
				if ($count>0)
				{
					$classSize = $classSize + 1;
				}
				
				}

	
			
	
	
	$classTotal=0;
	$selectString = "SELECT * from completion ";
		//$selectString = "SELECT completionID from completion where studentID = '$studentID' and labID = 2"
	$classAverage = $pdo->prepare($selectString);
	$classAverage->execute();
	//$row=$userAverage->fetch();
	$count=$classAverage->rowCount();
			foreach($classAverage as $row)
				{
				  
				if ($count>0)
				{
					$classTotal = $classTotal + 1;
				}

	
				}
				
					$labTotal=0;
	$selectString = "SELECT * from lab where isCheckpoint = 1  ";
		//$selectString = "SELECT completionID from completion where studentID = '$studentID' and labID = 2"
	$class = $pdo->prepare($selectString);
	$class->execute();
	//$row=$userAverage->fetch();
	$count=$class->rowCount();
			foreach($class as $row)
				{
				  
				if ($count>0)
				{
					$labTotal = $labTotal + 1;
				}

	
				}
				
				
				
				
			
				$classAverageCompletion = $classTotal / $classSize;
				
			
				$classPercent = (($classAverageCompletion / $labTotal)*100);
				$userPercent = (($userTotal / $labTotal)*100);
				
				if ($a == "no")
				{
					
					$colour = "red";
				}
				else
				{
					$colour = "green";
					
				}
				
				$checkred = ($classPercent-25);
				$checkYellow = ($classPercent-15);
				
				if ($checkred > $userPercent)
				{
					$winner = "red";
				}
				
				 if ($checkYellow > $userPercent)
				{
					$winner = "yelow";
				}
				
				else
				{
					$winner = "green";
					
				}
				
			
				
}
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}



catch (PDOException $e)
{
	 $error = 'Select statement error';
    include 'error.html.php';
    exit();
}



		

   
	
	include 'studentPage.html.php';



	
	

			
?>