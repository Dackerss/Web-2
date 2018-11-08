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



?>