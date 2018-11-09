<?php
include 'connect.php';
try
{
    $pdo = new pdo("mysql:host=$host;dbname=$database", $userMS, $passwordMS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch(PDOException $e)
{
  $error = 'Connection to database failed';
  include 'error.html.php';
  exit();
}
try{
	
	// drops tables if they exists 
        $dropQuery ="DROP TABLE IF EXISTS data";
        $pdo->exec($dropQuery);
        $dropQuery ="DROP TABLE IF EXISTS completion";
        $pdo->exec($dropQuery);
		$dropQuery ="DROP TABLE IF EXISTS students";
        $pdo->exec($dropQuery);	    
		$dropQuery ="DROP TABLE IF EXISTS admin";
        $pdo->exec($dropQuery);
        $dropQuery ="DROP TABLE IF EXISTS lab";
        $pdo->exec($dropQuery);
	    $dropQuery ="DROP TABLE IF EXISTS tool";
        $pdo->exec($dropQuery);

        $createQuery ="CREATE TABLE students
        (
            studentID int(10) NOT NULL AUTO_INCREMENT,
			studentNumber int(100),
			firstName 	VARCHAR(10),
			lastName 	VARCHAR(100),
			userName 	VARCHAR(100),
            password 	VARCHAR(100),
			hasLoggedIn        TINYINT(1) NOT NULL DEFAULT '0',
            PRIMARY KEY(studentID)
        )";
        $pdo->exec($createQuery);
}
		catch (PDOException $e)		
{
    $error = 'Creating the table failed 6';
    include 'error.html.php';
    exit();
}
try {

        $createQuery ="CREATE TABLE tool
        (
            toolID int(10) 		NOT NULL AUTO_INCREMENT,
            tableNamex         	VARCHAR(100),
            tableNamey        	VARCHAR(100),
			northLabel          VARCHAR(100),
			southLabel          VARCHAR(100), 
			eastLabel           VARCHAR(100),
			westLabel			VARCHAR(100),
			
			
            PRIMARY KEY(toolID)
			       )";
        $pdo->exec($createQuery);
}
		catch (PDOException $e)
{
    $error = 'Creating the table failed 5';
    include 'error.html.php';
    exit();
}

try {
		        $createQuery ="CREATE TABLE admin
        (
            adminID int(10) 		NOT NULL AUTO_INCREMENT,
            firstName       		VARCHAR(100),
            lastName        		VARCHAR(100),
			userName        	    VARCHAR(100),
			password         	    VARCHAR(100), 
			adminPassword         	VARCHAR(100),

            PRIMARY KEY(adminID)
			
        )";
        $pdo->exec($createQuery);
		
}
		catch (PDOException $e)
{
    $error = 'Creating the table failed 4';
    include 'error.html.php';
    exit();
}
try {
				        $createQuery ="CREATE TABLE lab
        (
            labID int(10) 		NOT NULL AUTO_INCREMENT,
            labname         	VARCHAR(100),
            isCheckpoint        TINYINT(1) NOT NULL DEFAULT '0',
		
			
			
            PRIMARY KEY(labID)
			
        )";
		
		
        $pdo->exec($createQuery);
}
		catch (PDOException $e)
{
    $error = 'Creating the table failed 3';
    include 'error.html.php';
    exit();
}
try {
						        $createQuery ="CREATE TABLE completion
        (
            completionID int(10) 		NOT NULL AUTO_INCREMENT,
            studentID    int(11)        NOT NULL,
			labID        int(10)        NOT NULL, 
            responseTime DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
		
			
			
            PRIMARY KEY(completionID),
			FOREIGN KEY(labID) REFERENCES lab(labID),
			FOREIGN KEY(studentID) REFERENCES students(studentID)
			
        )";
        $pdo->exec($createQuery);
}
catch (PDOException $e)
{
    $error = 'Creating the table failed 2';
    include 'error.html.php';
    exit();
}
try {
		$createQuery ="CREATE TABLE data
        (
            dataID		 int(10) 		NOT NULL AUTO_INCREMENT,
			toolID 		 int(11)	    NOT NULL,
            studentID    int(32)        NOT NULL,
			labID        int(10)        NOT NULL,
            xValue       int(32) 	DEFAULT NULL,
			yValue       int(32)	DEFAULT NULL,
		
			
			
            PRIMARY KEY(dataID),
			FOREIGN KEY(toolID) REFERENCES tool(toolID),
			FOREIGN KEY(studentID) REFERENCES students(studentID),
			FOREIGN KEY(labID) REFERENCES lab(labID)
			
        )";
		
        $pdo->exec($createQuery);

     
     
     
     
        }
catch (PDOException $e)
{
    $error = 'Creating the table failed 1';
    include 'error.html.php';
    exit();
}
		
		



try
{

	
	$insertQuery ="INSERT into tool(tableNamex, tableNamey, northLabel, southLabel, eastLabel, westLabel) VALUES(:tableNamex,:tableNamey,:northLabel,:southLabel,:eastLabel,:westLabel)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':tableNamex',$tableNamex);
	$stmt->bindParam(':tableNamey',$tableNamey);
	$stmt->bindParam(':northLabel',$northLabel);
	$stmt->bindParam(':southLabel',$southLabel);
	$stmt->bindParam(':eastLabel',$eastLabel);	
	$stmt->bindParam(':westLabel',$westLabel);	
	
		$file = fopen("tool.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$tableNamex=$myArray[0];
			$tableNamey=$myArray[1];
			$northLabel=$myArray[2];
			$southLabel=$myArray[3];
			$eastLabel=$myArray[4];
			$westLabel=$myArray[5];
			$stmt->execute();
		}
		
		fclose($file);
		
	
		
			$insertQuery ="INSERT into admin(firstName, lastName, userName, password, adminPassword) VALUES(:firstName,:lastName,:userName,:password,:adminPassword)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':firstName',$firstName);
	$stmt->bindParam(':lastName',$lastName);
	$stmt->bindParam(':userName',$userName);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':adminPassword',$adminPassword);	
	
	
		$file = fopen("admin.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$firstName=$myArray[0];
			$lastName=$myArray[1];
			$userName=$myArray[2];
			$password=$myArray[3];
			$adminPassword=$myArray[4];
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($adminPassword, $salt);
			$adminPassword = $hash;
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($password, $salt);
			$password = $hash;
			$stmt->execute();
		}
		
		
		fclose($file);
		
			$insertQuery ="INSERT into lab(labname, isCheckpoint) VALUES(:labname,:isCheckpoint)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':labname',$labname);
	$stmt->bindParam(':isCheckpoint',$isCheckpoint);

	
	
		$file = fopen("lab.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$labname=$myArray[0];
			$isCheckpoint=$myArray[1];
			$stmt->execute();
		}
		
		fclose($file);
		

			$insertQuery ="INSERT into students(studentNumber, firstName, lastName, userName, password, hasLoggedIn) VALUES(:studentNumber,:firstName,:lastName,:userName,:password,:hasLoggedIn)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':studentNumber',$studentNumber);
	$stmt->bindParam(':firstName',$firstName);
	$stmt->bindParam(':lastName',$lastName);
	$stmt->bindParam(':userName',$userName);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':hasLoggedIn',$hasLoggedIn);
		
	
		$file = fopen("students.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$studentNumber=$myArray[0];
			$firstName=$myArray[1];
			$lastName=$myArray[2];
			$userName=$myArray[3];
			$password=$studentNumber;
			$cost = 10;
			$salt = strtr(base64_encode(random_bytes(16)), '+', '.');
			$salt = sprintf("$2a$%02d$", $cost) . $salt;
			$hash = crypt($password, $salt);
			$password = $hash;
			$hasLoggedIn=$myArray[4];
			$stmt->execute();
		}
		
		fclose($file);
		
		
		
		
			$insertQuery ="INSERT into completion(studentID, labID) VALUES(:studentID,:labID)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':studentID',$studentID);
	$stmt->bindParam(':labID',$labID);
	
		
		
	
		$file = fopen("completion.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$studentID=$myArray[0];
			$labID=$myArray[1];
			$stmt->execute();
		}
		
		fclose($file);
			
			
		
		
			
		
			
						$insertQuery ="INSERT into data(toolID, studentID, labID, xValue, yValue) VALUES(:toolID,:studentID,:labID,:xValue,:yValue)";
	$stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':toolID',$toolID);
	$stmt->bindParam(':studentID',$studentID);
	$stmt->bindParam(':labID',$labID);
	$stmt->bindParam(':xValue',$xValue);
	$stmt->bindParam(':yValue',$yValue);	
		
	
		$file = fopen("data.csv","r");
		
		while(!feof($file))
		{
			$myArray=fgetcsv($file);
			$toolID=$myArray[0];
			$studentID=$myArray[1];
			$labID=$myArray[2];
			$xValue=$myArray[3];
			$yValue=$myArray[4];
			$stmt->execute();
		}
		
		fclose($file);


}

catch (PDOException $e)
{
    $error = 'Insert data failed';
    include 'error.html.php';
    exit();
}


try
{
 

   
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
} 
include 'landing.html.php';


?>