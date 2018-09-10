<?php
// Joshua Dackers 
// Student ID :1000043644
// Web 2 The Searchable Athletes Page Assignment 
// 9/10/2018
// Creates the tables and assigns the variable given in the csv file

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

// Drops tables if they exist and recreates them
try{
        $dropQuery ="DROP TABLE IF EXISTS AthleteTable";
        $pdo->exec($dropQuery);
        $dropQuery ="DROP TABLE IF EXISTS EventTable";
        $pdo->exec($dropQuery);

        $createQuery ="CREATE TABLE EventTable
        (
            athleteID int(6) NOT NULL AUTO_INCREMENT,
            sport VARCHAR(30) NOT NULL,
            event VARCHAR(30) NOT NULL,
            PRIMARY KEY(athleteID)
        )";
        $pdo->exec($createQuery);
		
	
        $dropQuery ="DROP TABLE IF EXISTS AthleteTable";
        $pdo->exec($dropQuery);
        $createQuery ="CREATE TABLE AthleteTable
        (
            athleteID int(6) NOT NULL AUTO_INCREMENT,
            name      VARCHAR(20) NOT NULL,
            medal     VARCHAR(20) NOT NULL,
            image     VARCHAR(20) NOT NULL, 
            PRIMARY KEY(athleteID)
        )";
        $pdo->exec($createQuery);
     
        }
catch (PDOException $e)
{
    $error = 'Creating the table failed';
    include 'error.html.php';
    exit();
}
		
		


try
{

// inserts all the data into the table reading it form a external file
    $insertQuery ="INSERT into EventTable(sport, event) VALUES(:sport,:event)";
    $stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':sport',$sport);
	$stmt->bindParam(':event',$event);
	
        $file = fopen("event.csv","r");
   
    while(!feof($file))
    {
        $myArray=fgetcsv($file);
        $sport=$myArray[0];
    	$event=$myArray[1];
        $stmt->execute();	
    }
    fclose($file);

		
	
	  $insertQuery ="INSERT into  AthleteTable(name, medal, image) VALUES(:name,:medal,:image)";
    $stmt =$pdo->prepare($insertQuery);
	$stmt->bindParam(':name',$name);
	$stmt->bindParam(':medal',$medal);
    $stmt->bindParam(':image',$image);
	
        $file = fopen("Medals.csv","r");
    while(!feof($file))
    {
        $myArray=fgetcsv($file);
        $medal=$myArray[0];
    	$name=$myArray[1];
        $image=$myArray[2];
        $stmt->execute();	
    }

	

}

catch (PDOException $e)
{
    $error = 'Insert data failed';
    include 'error.html.php';
    exit();
}


try
{
	//used for testing

    $selectString = "SELECT * from AthleteTable";
   $result = $pdo->query($selectString);
	
 $selectString = "SELECT * from EventTable";
    $result1 = $pdo->query($selectString);

   // Joins the the two tables and displays all values 
    $selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID";
    $result2 = $pdo->query($selectString);
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}


include 'output1.html.php';
?>