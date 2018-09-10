<?php
// Joshua Dackers 
// Student ID :1000043644
// Web 2 The Searchable Athletes Page Assignment 
// 9/10/201

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

// makes all the select staments to be given to the table after the filtter is selected 
try
{
   $selectString = "SELECT DISTINCT sport from EventTable ORDER BY sport ASC";
    $result = $pdo->query($selectString);
	
	  $selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID";
    $table = $pdo->query($selectString);
	
	 $selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='boxing'";
    $Boxing = $pdo->query($selectString);
	
	$selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='athletics'";
    $Athletics = $pdo->query($selectString);
	
	$selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='cycling-Mountain bike'";
    $Mountain = $pdo->query($selectString);
	
	$selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='cycling-Track'";
    $Track = $pdo->query($selectString);
	
	$selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='Lawn bowls'";
    $Lawn = $pdo->query($selectString);
	
	$selectString = "SELECT AthleteTable.name,AthleteTable.medal,AthleteTable.image,EventTable.sport,EventTable.event from AthleteTable inner JOIN EventTable On EventTable.athleteID=AthleteTable.athleteID where sport='swimming'";
    $Swim = $pdo->query($selectString);
	
}
catch (PDOException $e)
{
    $error = 'Select statement error';
    include 'error.html.php';
    exit();
}

			
		
// checks if the filtter button has been selected and loads the output page 
if (isset($_POST['confirm']))
{
	
// Check the result of the Search function and assigns it to the variable given to the table 
switch ($_POST['dynamic_data']) {
    case "Boxing":
        $result2 = $Boxing;
        break;
    case "Swimming":
        $result2 = $Swim;
        break;
    case "Athletics":
        $result2 = $Athletics;
        break;
		 case "Cycling-Mountain bike":
        $result2 = $Mountain;
        break;
		 case "Lawn bowls":
        $result2 = $Lawn;
        break;
		 case "Cycling-Track":
        $result2 = $Track;
        break;
		 case "all":
        $result2 = $table;
        break;
		
}

			
    
     include 'outputTable.html.php';
	
	

}

// Loads the search page on inital start
else
{
  include 'search.html.php';
}
			
?>