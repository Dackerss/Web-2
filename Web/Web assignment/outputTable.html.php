<!DOCTYPE html>
<!-- 
 Joshua Dackers 
Student ID :1000043644
Web 2 The Searchable Athletes Page Assignment 
 9/10/2018
 
 Used to display the filtered table
-->
<html>
<head>
    <title>Table output</title>
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
// Used on this page so rather than a back button the user can jsut select a new filter 
 foreach($result as $row ) {

echo "<option value=\"$row[sport]\"> $row[sport]</option>";

}
?>
</div>
<div class= "tablediv">
<input type='submit' name = 'confirm'  value='Filter'>	

</select>
			</div>	 

<div class= "bodydiv">

 
            <table class="w3-table">
                <tr>
                    <th>Name</th><th>Medal</th><th>Sport</th><th>Event</th><th>Pic</th>
                </tr>
<?php

 foreach($result2 as $row )
 {
     echo("<tr><td>$row[name]</td><td>$row[medal]</td><td>$row[sport]</td><td>$row[event]</td><td><img src=$row[image]> </td></tr>");
 }
 ?>
 </table>
</div>
<div class= "footerdiv">

</div>
   
 </body>
 </form>
 </html>