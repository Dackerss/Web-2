<!DOCTYPE html>
<!-- 
 Joshua Dackers 
Student ID :1000043644
Web 2 The Searchable Athletes Page Assignment 
 9/10/2018
 
 Only really used to load for the inital page with no table 
-->
<html>
<head>
    <title>New Zealand medal winnners </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
   <link rel="stylesheet" type="text/css" href="StyleSheet.css"> 
   <?php
$self = htmlentities($_SERVER['PHP_SELF']);
echo "<form action = '$self' method='POST'>";
?> 
    </head>
    <body>

 <div class= "headerdiv">
				<h1>New Zealand medal winners</h1>
				<select name="dynamic_data">
<option value="all"> Show all</option>
<?php
// loading in the options dynamically to the drop down
 foreach($result as $row ) {

echo "<option value=\"$row[sport]\"> $row[sport]</option>";



}
?>
</select>
<input type='submit' name = 'confirm'  value='Filter'>	
			</div>	 

<div class= "bodydiv">


</div>





   
 </body>
 </html>